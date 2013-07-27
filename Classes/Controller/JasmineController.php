<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Rens Admiraal <rens.admiraal@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Testrunner controller
 *
 * @category    Controller
 * @package     TYPO3
 * @subpackage  phpunit
 * @author      Rens Admiraal <rens.admiraal@typo3.org>
 */
class Tx_Phpunit_Controller_JasmineController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Service class to find tests and their includes
	 *
	 * @var Tx_Phpunit_Service_Jasmine_TestFinderService
	 */
	protected $testFinderService;

	/**
	 * Inject the test include service.
	 *
	 * @param Tx_Phpunit_Service_Jasmine_TestFinderService $testIncludeService
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
				'extKey' => $arguments['extensionKey']
			));
		}
	}

}

?>