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
 * View helper for the BE configuration.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Rens Admiraal <rens.admiraal@typo3.org>
 */
class Tx_Phpunit_ViewHelpers_Jasmine_Be_ConfigurationViewHelper extends Tx_Fluid_ViewHelpers_Be_AbstractBackendViewHelper {
	/**
	 * the extension key
	 *
	 * @var string
	 */
	protected $extensionKey = '';

	/**
	 * the relative path to the extension folder, relative to TYPO3_mainDir
	 *
	 * @var string
	 */
	protected $baseUrl = '';

	/**
	 * the relative path to the document root, relative to the TYPO3_mainDir
	 *
	 * @var string
	 */
	protected $backPath = '';

	/**
	 * @var t3lib_PageRenderer
	 */
	protected $pageRenderer = NULL;

	/**
	 * Initializes the ViewHelper.
	 *
	 * @return void
	 */
	public function initialize() {
		$this->extensionKey = strtolower($this->controllerContext->getRequest()->getControllerExtensionName());
		$this->backPath = str_repeat('../', substr_count(TYPO3_mainDir, '/'));
		$this->baseUrl = $this->backPath . t3lib_extMgm::siteRelPath($this->extensionKey);

		$doc = $this->getDocInstance();
		$this->pageRenderer = $doc->getPageRenderer();
	}

	/**
	 * Sets the configuration for the page renderer.
	 *
	 * @param string $extensionKey the currently selected extensionKey (if set)
	 * @param bool $loadHtmlSpecRunner whether to load the spec runner on Ext.Ready
	 *
	 * @return string
	 */
	public function render($extensionKey = NULL, $loadHtmlSpecRunner = FALSE) {
		// enable debugging helpers if we are in development context
		if (!empty($_SERVER['TYPO3_CONTEXT']) && $_SERVER['TYPO3_CONTEXT'] === 'Development') {
			$this->pageRenderer->disableCompressJavascript();
			$this->pageRenderer->enableExtJsDebug();
		}

		if (($extensionKey !== NULL) && $loadHtmlSpecRunner) {
			$this->pageRenderer->addExtOnReadyCode(
				'TYPO3.Phpunit.Jasmine.App.loadHtmlSpecRunner("' . $extensionKey . '")'
			);
		}

		$this->pageRenderer->addJsFile(
			$this->backPath . TYPO3_mainDir . 'ajax.php?ajaxID=ExtDirect::getAPI&namespace=TYPO3.Phpunit', NULL, FALSE, TRUE
		);
		$this->pageRenderer->addJsFile($this->baseUrl . 'Resources/Public/JavaScript/Jasmine/Main.js');
		$this->pageRenderer->addCssFile($this->baseUrl . 'Resources/Public/CSS/Jasmine.css');
	}
}