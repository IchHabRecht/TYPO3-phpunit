<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test finder.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Rens Admiraal <rens.admiraal@typo3.org>
 */
class Tx_Phpunit_Service_Jasmine_TestFinderService {
	/**
	 * A multidimensional array with the following structure:
	 * extKey1
	 * 	- absolutePathToTest1
	 *  - absolutePathToTest2
	 * extKey2
	 *  - absolutePathToTest1
	 *
	 * Only extension keys with existing test files are included.
	 *
	 * @var array[]
	 */
	protected $testDefinitionList = array();

	/**
	 * Finds the list of extension keys containing test files.
	 *
	 * @return array
	 */
	public function findExtensionsWithTests() {
		if (empty($this->testDefinitionList)) {
			$this->findTestDefinitions();
		}

		$extensionList = array(
			array(
				'extensionKey' => '-',
				'icon' => '',
				'name' => Tx_Extbase_Utility_Localization::translate('all_extensions', 'phpunit'),
			),
		);

		$extensionKeys = array_keys($this->testDefinitionList);
		foreach ($extensionKeys as $extensionKey) {
			$path = preg_replace(
				'#(' . PATH_typo3conf . 'ext/|' . PATH_typo3 . 'sysext/|/$)#',
				NULL,
				t3lib_extMgm::extPath($extensionKey)
			);
			$nameParts = explode('_', $path);
			$nameParts = array_map('ucfirst', $nameParts);

			$extensionList[$extensionKey] = array(
				'extensionKey' => $extensionKey,
				'icon' => '/' . t3lib_extMgm::siteRelPath($extensionKey) . 'ext_icon.gif',
				'name' => implode(' ', $nameParts),
			);
		}

		return $extensionList;
	}

	/**
	 * Finds all extensions with tests, and the actual test definition files.
	 *
	 * @return array
	 */
	public function findTestDefinitions() {
		if (t3lib_div::int_from_ver(TYPO3_version) >= 6000000) {
			$enabledExtensionList = t3lib_extMgm::getLoadedExtensionListArray();
		} else {
			$enabledExtensionList = t3lib_extMgm::getEnabledExtensionList();
			$enabledExtensionList = explode(',', $enabledExtensionList);
		}

		foreach ($enabledExtensionList as $extensionKey) {
			$testDirectory = t3lib_extMgm::extPath($extensionKey, 'Tests/JavaScript/Jasmine/');
			if (is_dir($testDirectory)) {
				$this->testDefinitionList[$extensionKey] = self::findTestDefinitionsFromDirectory($testDirectory);
			}
		}

		// remove entries without test definitions
		foreach ($this->testDefinitionList as $index => $value) {
			if (empty($value)) {
				unset($this->testDefinitionList[$index]);
			}
		}

		return $this->testDefinitionList;
	}

	/**
	 * Recursively finds all test definitions files in a directory.
	 *
	 * Test definition files have to end with "Test.js", hidden folders (starting with a ".") are ignored.
	 *
	 * @param string $directory
	 *
	 * @return string[]
	 */
	public static function findTestDefinitionsFromDirectory($directory) {
		$testFiles = array();
		$files = t3lib_div::getAllFilesAndFoldersInPath(array(), $directory, 'js', FALSE, 99, '\..*');
		foreach ($files as $file) {
			if (substr(strtolower($file), -7) === 'test.js') {
				$testFiles[] = t3lib_div::getFileAbsFileName($file);
			}
		}

		return $testFiles;
	}

	/**
	 * Find includes in the test definitions.
	 *
	 * @param string[] $testDefinitions
	 *
	 * @return array
	 */
	public function findIncludesInTestDefinitions(array $testDefinitions) {
		$includes = array();

		foreach ($testDefinitions as $testDefinitions) {
			foreach ($testDefinitions as $testDefinition) {
				$this->findIncludesInTestDefinitionFile($testDefinition, $includes);
			}
		}
		return array_unique($includes);
	}

	/**
	 * Find includes in file.
	 *
	 * The includes are specified in a docblock in the test file, in lines marked with @include. The file path
	 * can contain the usual constructs like EXT:extname.
	 *
	 * @param string $file Filename to find includes for.
	 * @param array $includes Array to which the includes found should be appended.
	 *
	 * @return void
	 */
	protected function findIncludesInTestDefinitionFile($file, array &$includes) {
		if (!is_file($file)) {
			return;
		}

		preg_match_all('/\\/\\*\\*(.*?)\\*\\//s', file_get_contents($file), $docBlocks);
		foreach ($docBlocks[1] as $docBlock) {
			preg_match_all('/@include ([^\\t]*)$/m', $docBlock, $blockIncludes);
			if (empty($blockIncludes[1])) {
				continue;
			}

			foreach ($blockIncludes[1] as $filename) {
				$filename = trim($filename);
				$filename = str_replace(PATH_site, '', t3lib_div::getFileAbsFileName($filename, FALSE));
				if (!in_array($filename, $includes, TRUE)) {
					$includes[] = $filename;
				}
			}
		}
	}
}