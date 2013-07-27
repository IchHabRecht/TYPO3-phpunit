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
 * ExtDirect service.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Rens Admiraal <rens.admiraal@typo3.org>
 */
class Tx_Phpunit_Service_Jasmine_ExtDirectService {
	/**
	 * @var Tx_Phpunit_Service_Jasmine_TestFinderService
	 */
	protected $testFinderService = NULL;

	/**
	 * @var Tx_Phpunit_Service_Jasmine_SpecRunnerWriterService
	 */
	protected $specRunnerWriter = NULL;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->testFinderService = t3lib_div::makeInstance('Tx_Phpunit_Service_Jasmine_TestFinderService');
		$this->specRunnerWriter = t3lib_div::makeInstance('Tx_Phpunit_Service_Jasmine_SpecRunnerWriterService');
	}

	/**
	 * Renders the HTML spec runner file for the given $extKey (or all extensions if $$extensionKey == '-').
	 *
	 * @param string $extensionKey the extension key
	 *
	 * @return string[] response statuses
	 */
	public function getHtmlSpecRunner($extensionKey) {
		$testDefinitions = $this->testFinderService->findTestDefinitions();
		if ($extensionKey !== '-') {
			$testDefinitions = array($testDefinitions[$extensionKey]);
		}

		$includes = $this->testFinderService->findIncludesInTestDefinitions($testDefinitions);
		$testDefinitionIncludes = array();
		foreach ($testDefinitions as $testDefinitions) {
			foreach ($testDefinitions as $testDefinition) {
				$testDefinitionIncludes[] = str_replace(PATH_site, NULL, $testDefinition);
			}
		}

		$filename = $this->specRunnerWriter->writeSpecRunner($extensionKey, $testDefinitionIncludes, $includes, 'html');
		if ($filename) {
			$result = array('status' => 'success', 'file' => $filename);
		} else {
			$result = array('status' => 'failed');
		}

		return $result;
	}
}