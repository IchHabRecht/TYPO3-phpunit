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
 * Spec runner writer service.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Rens Admiraal <rens.admiraal@typo3.org>
 */
class Tx_Phpunit_Service_Jasmine_SpecRunnerWriterService {
	/**
	 * View for rendering the content of the spec runner.
	 *
	 * @var Tx_Fluid_View_StandaloneView
	 */
	protected $view = NULL;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->view = t3lib_div::makeInstance('Tx_Fluid_View_StandaloneView');
	}

	/**
	 * Writes a spec runner file.
	 *
	 * @param string $extensionKey the extension key
	 * @param string[] $testDefinitionIncludes test definition files to include
	 * @param string[] $includes JavaScript files to include before the test definitions
	 * @param string $type the spec runner type ("HTML", "JUnit" or "CLI").
	 *
	 * @return string the spec runner filename
	 */
	public function writeSpecRunner($extensionKey, array $testDefinitionIncludes, array $includes, $type) {
		$this->view->setTemplatePathAndFilename(
			t3lib_extMgm::extPath('phpunit', 'Resources/Private/Standalone/JasmineSpecRunner.html')
		);
		$this->view->assignMultiple(
			array(
				'extPath' => t3lib_extMgm::siteRelPath('phpunit'),
				'includes' => $includes,
				'specs' => $testDefinitionIncludes,
			)
		);

		return $this->writeSpecRunnerToTemporaryDirectory($extensionKey, $type, $this->view->render());
	}

	/**
	 * Writes the spec runner file to typo3temp.
	 *
	 * @param string $extensionKey the extension key
	 * @param string $type the type of the spec runner ("HTML", "JUnit" or "CLI")
	 * @param string $content spec runner file contents
	 *
	 * @return string the spec runner filename
	 */
	private function writeSpecRunnerToTemporaryDirectory($extensionKey, $type, $content) {
		try {
			if (!is_dir(PATH_site . 'typo3temp/tx_phpunit/jasmine/')) {
				t3lib_div::mkdir_deep(PATH_site . 'typo3temp/', 'tx_phpunit/jasmine');
			}

			$filename = 'typo3temp/tx_phpunit/jasmine/' . $type . '_' . t3lib_div::shortMD5($extensionKey) . '.html';
			file_put_contents(PATH_site . $filename, $content);
		} catch (Exception $e) {
			$filename = '';
		}

		return $filename;
	}
}