<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2013 Oliver Klee (typo3-coding@oliverklee.de)
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Phpunit_TestRunner_BackEndTestRunnerTest extends Tx_Phpunit_TestCase {
	/**
	 * @var Tx_Phpunit_TestRunner_BackEndTestRunner
	 */
	protected $fixture = NULL;

	/**
	 * @var Tx_Phpunit_TestingDataContainer
	 */
	protected $request = NULL;

	/**
	 * @var Tx_Phpunit_Service_TestFinder
	 */
	protected $testFinder = NULL;

	/**
	 * @var Tx_Phpunit_TestingDataContainer
	 */
	protected $userSettingsService = NULL;

	/**
	 * @var Tx_Phpunit_TestingDataContainer
	 */
	protected $extensionSettingsService = NULL;

	protected function setUp() {
		$this->fixture = new Tx_Phpunit_TestRunner_BackEndTestRunner();

		$this->request = new Tx_Phpunit_TestingDataContainer();
		$this->fixture->injectRequest($this->request);

		$this->testFinder = new Tx_Phpunit_Service_TestFinder();

		$this->userSettingsService = new Tx_Phpunit_TestingDataContainer();
//		$this->fixture->injectUserSettingsService($this->userSettingsService);
		$this->testFinder->injectUserSettingsService($this->userSettingsService);

//		$this->extensionSettingsService = new Tx_Phpunit_TestingDataContainer();
//		$this->testFinder->injectExtensionSettingsService($this->extensionSettingsService);
		$this->fixture->injectTestFinder($this->testFinder);
	}

	protected function tearDown() {
		unset($this->fixture, $this->request, $this->testFinder, $this->userSettingsService
		, $this->extensionSettingsService);

		t3lib_div::purgeInstances();
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithEmptyRequestReturnsSuiteWithoutTestCases() {
		$this->assertSame(
			0,
			$this->fixture->createTestSuiteForSelection()->count()
		);
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithExistingSelectedTestCaseReturnsSuiteWithThatTestCase() {
		$testCaseName = get_class($this);

		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->once())->method('addTestSuite')->with($testCaseName);
		t3lib_div::addInstance('PHPUnit_Framework_TestSuite', $testSuite);

		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTCASE, $testCaseName);

		$this->assertSame(
			$testSuite,
			$this->fixture->createTestSuiteForSelection()
		);
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithExistingSelectedTestCaseAndMatchingSelectedExtensionReturnsSuiteWithThatTestCase() {
		$testCaseName = get_class($this);

		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->once())->method('addTestSuite')->with($testCaseName);
		t3lib_div::addInstance('PHPUnit_Framework_TestSuite', $testSuite);

		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTCASE, $testCaseName);
		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE, 'phpunit');

		$this->assertSame(
			$testSuite,
			$this->fixture->createTestSuiteForSelection()
		);
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithExistingSelectedTestCaseAndMismatchingSelectedExtensionReturnsSuiteWithThatTestCase() {
		$testCaseName = get_class($this);

		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->once())->method('addTestSuite')->with($testCaseName);
		t3lib_div::addInstance('PHPUnit_Framework_TestSuite', $testSuite);

		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTCASE, $testCaseName);
		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE, 'cms');

		$this->assertSame(
			$testSuite,
			$this->fixture->createTestSuiteForSelection()
		);
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithExistingSelectedNonTestCaseClassReturnsSuiteWithoutTestCases() {
		$testCaseName = 'Tx_Phpunit_TestRunner_BackEndTestRunner';

		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->never())->method('addTestSuite');
		t3lib_div::addInstance('PHPUnit_Framework_TestSuite', $testSuite);

		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTCASE, $testCaseName);

		$this->assertSame(
			$testSuite,
			$this->fixture->createTestSuiteForSelection()
		);
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithNonExistingSelectedClassReturnsSuiteWithoutTestCases() {
		$testCaseName = 'This_Class_Does_Not_Exist';

		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->never())->method('addTestSuite');
		t3lib_div::addInstance('PHPUnit_Framework_TestSuite', $testSuite);

		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTCASE, $testCaseName);

		$this->assertSame(
			$testSuite,
			$this->fixture->createTestSuiteForSelection()
		);
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithNonExistentSelectedExtensionReturnsSuiteWithoutTestCases() {
		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE, 'does_not_exist');

		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->never())->method('addTestSuite');
		t3lib_div::addInstance('PHPUnit_Framework_TestSuite', $testSuite);

		$this->assertSame(
			$testSuite,
			$this->fixture->createTestSuiteForSelection()
		);
	}

	/**
	 * @test
	 */
	public function createTestSuiteForSelectionWithExistentSelectedExtensionReturnsSuiteAllTestClassesOfThatExtension() {
		$this->markTestIncomplete('code me!');
		$testCaseName = get_class($this);

		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->once())->method('addTestSuite')->with($testCaseName);
		t3lib_div::addInstance('PHPUnit_Framework_TestSuite', $testSuite);

		$this->request->set(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE, 'phpunit');

		$this->assertSame(
			$testSuite,
			$this->fixture->createTestSuiteForSelection()
		);
	}

	/**
	 * @test
	 */
	public function runTestSuiteForSelectionReturnsTestResult() {
		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');

		$this->assertInstanceOf(
			'PHPUnit_Framework_TestResult',
			/** @var $testSuite PHPUnit_Framework_TestSuite */
			$this->fixture->runTestSuiteForSelection($testSuite)
		);;
	}

	/**
	 * @test
	 */
	public function runTestSuiteForSelectionWithEmptyRequestRunsSuiteWithoutFilter() {
		$testSuite = $this->getMock('PHPUnit_Framework_TestSuite');
		$testSuite->expects($this->once())->method('run')->with($this->anything(), FALSE);

		/** @var $testSuite PHPUnit_Framework_TestSuite */
		$this->fixture->runTestSuiteForSelection($testSuite);
	}
}
?>