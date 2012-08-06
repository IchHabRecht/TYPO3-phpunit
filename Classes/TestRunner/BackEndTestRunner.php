<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Oliver Klee <typo3-coding@oliverklee.de>
 *
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
 * This class provides functions for running unit tests from the back-end module.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Phpunit_TestRunner_BackEndTestRunner {
	/**
	 * @var Tx_Phpunit_Interface_Request
	 */
	protected $request = NULL;

	/**
	 * @var Tx_Phpunit_Service_TestFinder
	 */
	protected $testFinder = NULL;

	/**
	 * The destructor.
	 */
	public function __destruct() {
		unset($this->request, $this->testFinder);
	}

	/**
	 * Injects the request.
	 *
	 * @param Tx_Phpunit_Interface_Request $request the request to inject
	 *
	 * @return void
	 */
	public function injectRequest(Tx_Phpunit_Interface_Request $request) {
		$this->request = $request;
	}

	/**
	 * Injects the test finder.
	 *
	 * @param Tx_Phpunit_Service_TestFinder $testFinder the test finder to inject
	 *
	 * @return void
	 */
	public function injectTestFinder(Tx_Phpunit_Service_TestFinder $testFinder) {
		$this->testFinder = $testFinder;
	}

	/**
	 * Creates a test suite that contains the test cases (or the single test) that have been selected in the request.
	 *
	 * If nothing has been selected, the test suite will not contain any test cases.
	 *
	 * The test suite returned by this method is intended to be run using runTestSuiteForSelection.
	 *
	 * @return PHPUnit_Framework_TestSuite the test suite with the test cases added as selected in the request
	 *
	 * @see runTestSuiteForSelection
	 */
	public function createTestSuiteForSelection() {
		/** @var $testSuite PHPUnit_Framework_TestSuite */
		$testSuite = t3lib_div::makeInstance('PHPUnit_Framework_TestSuite');

		$selectedTestCaseName = $this->request->getAsString(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTCASE);
		if (($selectedTestCaseName !== '') && $this->testFinder->isValidTestCaseClassName($selectedTestCaseName)){
			$testSuite->addTestSuite($selectedTestCaseName);
		}

		return $testSuite;
	}

	/**
	 * Runs the provided test suite with filters as selected in the request.
	 *
	 * This function is expected to be called with the test suite returned by createTestSuiteForSelection.
	 *
	 * @param PHPUnit_Framework_TestSuite $testSuite the test suite to run
	 *
	 * @return PHPUnit_Framework_TestResult
	 *
	 * @see createTestSuiteForSelection
	 */
	public function runTestSuiteForSelection(PHPUnit_Framework_TestSuite $testSuite) {
		/** @var $testResult PHPUnit_Framework_TestResult */
		$testResult = t3lib_div::makeInstance('PHPUnit_Framework_TestResult');

		$testSuite->run($testResult, FALSE);

		return $testResult;
	}
}
?>