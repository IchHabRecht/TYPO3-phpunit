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
 * Test runner controller.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Rens Admiraal <rens.admiraal@typo3.org>
 */
class Tx_Phpunit_Controller_JasmineController extends Tx_Extbase_MVC_Controller_ActionController {
	/**
	 * @var Tx_Phpunit_Service_Jasmine_TestFinderService
	 */
	protected $testFinderService = NULL;

	/**
	 * Injects the test finder service.
	 *
	 * @param Tx_Phpunit_Service_Jasmine_TestFinderService $testFinderService
	 *
	 * @return void
	 */
	public function injectTestIncludeService(Tx_Phpunit_Service_Jasmine_TestFinderService $testFinderService) {
		$this->testFinderService = $testFinderService;
	}

	/**
	 * Index action which does not contain any logic since the actual initialization
	 * is done in JavaScript.
	 *
	 * @return void
	 */
	public function infoAction() {
	}

	/**
	 * Index action.
	 *
	 * @return void
	 */
	public function indexAction() {
		$arguments = $this->request->getArguments();
		$this->view->assign('arguments', $arguments);

		$extensionList = $this->testFinderService->findExtensionsWithTests();
		$this->view->assign('extensionList', $extensionList);

		$this->view->assign('M', t3lib_div::_GET('M'));

		if (!empty($arguments['extensionKey'])) {
			$this->view->assignMultiple(array(
				'loadHtmlSpecRunner' => TRUE,
				'extKey' => $arguments['extensionKey'],
			));
		}
	}
}