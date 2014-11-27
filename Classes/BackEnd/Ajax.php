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
 * This class uses the new AJAX broker in TYPO3 4.2.
 *
 * @see http://bugs.typo3.org/view.php?id=7096
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Kasper Ligaard <kasperligaard@gmail.com>
 * @author Michael Klapper <michael.klapper@aoemedia.de>
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 * @author Bastian Waidelich <bastian@typo3.org>
 * @author Carsten Koenig <ck@carsten-koenig.de>
 */
class Tx_Phpunit_BackEnd_Ajax {
	/**
	 * @var Tx_Phpunit_Interface_UserSettingsService
	 */
	protected $userSettingsService = NULL;

	/**
	 * @var string[]
	 */
	protected $validCheckboxKeys = array(
		'failure',
		'success',
		'error',
		'skipped',
		'incomplete',
		'testdox',
		'codeCoverage',
		'showMemoryAndTime',
		'runSeleniumTests',
	);

	/**
	 * The constructor.
	 *
	 * @param boolean $initializeUserSettingsService whether to automatically initialize the user settings service
	 */
	public function __construct($initializeUserSettingsService = TRUE) {
		if ($initializeUserSettingsService) {
			/** @var $userSettingsService Tx_Phpunit_Service_UserSettingsService */
			$userSettingsService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Tx_Phpunit_Service_UserSettingsService');
			$this->injectUserSettingsService($userSettingsService);
		}
	}

	/**
	 * The destructor.
	 */
	public function __destruct() {
		unset($this->userSettingsService);
	}

	/**
	 * Injects the user settings service.
	 *
	 * @param Tx_Phpunit_Interface_UserSettingsService $service the service to inject
	 *
	 * @return void
	 */
	public function injectUserSettingsService(Tx_Phpunit_Interface_UserSettingsService $service) {
		$this->userSettingsService = $service;
	}

	/**
	 * Used to broker incoming requests to other calls.
	 * Called by typo3/ajax.php
	 *
	 * @param array $unused additional parameters (not used)
	 * @param \TYPO3\CMS\Core\Http\AjaxRequestHandler $ajax the AJAX object for this request
	 *
	 * @return void
	 */
	public function ajaxBroker(array $unused, \TYPO3\CMS\Core\Http\AjaxRequestHandler $ajax) {
		$state = (boolean) \TYPO3\CMS\Core\Utility\GeneralUtility::_POST('state');
		$checkbox = \TYPO3\CMS\Core\Utility\GeneralUtility::_POST('checkbox');

		if (in_array($checkbox, $this->validCheckboxKeys, TRUE)) {
			$ajax->setContentFormat('json');
			$this->userSettingsService->set($checkbox, $state);
			$ajax->addContent('success', TRUE);
		} else {
			$ajax->setContentFormat('plain');
			$ajax->setError('Illegal input parameters.');
		}
	}
}