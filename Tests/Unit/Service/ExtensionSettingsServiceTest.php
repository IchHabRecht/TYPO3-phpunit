<?php
/*
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
 * Test case.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Phpunit_Service_ExtensionSettingsServiceTest extends Tx_Phpunit_TestCase {
	/**
	 * @var Tx_Phpunit_Service_ExtensionSettingsService
	 */
	protected $subject = NULL;

	/**
	 * @var string
	 */
	private $extensionConfigurationBackup = NULL;

	/**
	 * @var array
	 */
	protected $testConfiguration = array(
		'testValueString' => 'Hello world!',
		'testValueEmptyString' => '',
		'testValuePositiveInteger' => 42,
		'testValueZeroInteger' => 0,
		'testValueOneInteger' => 1,
		'testValueNegativeInteger' => -1,
		'testValueTrue' => TRUE,
		'testValueFalse' => FALSE,
		'testValueArray' => array('foo', 'bar'),
	);

	protected function setUp() {
		$this->extensionConfigurationBackup = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'];
		$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['phpunit'] = serialize($this->testConfiguration);

		$this->subject = new Tx_Phpunit_Service_ExtensionSettingsService();
	}

	protected function tearDown() {
		$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'] = $this->extensionConfigurationBackup;
	}

	/**
	 * @test
	 */
	public function classIsSingleton() {
		$this->assertInstanceOf(
			'TYPO3\\CMS\\Core\\SingletonInterface',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function classIsSingletonExtensionSettings() {
		$this->assertInstanceOf(
			'Tx_Phpunit_Interface_ExtensionSettingsService',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAsBooleanForMissingValueReturnsFalse() {
		$this->assertFalse(
			$this->subject->getAsBoolean('foo')
		);
	}

	/**
	 * @test
	 */
	public function getAsBooleanCanReturnFalseFromExtensionSettings() {
		$this->assertFalse(
			$this->subject->getAsBoolean('testValueFalse')
		);
	}

	/**
	 * @test
	 */
	public function getAsBooleanCanReturnTrueFromExtensionSettings() {
		$this->assertTrue(
			$this->subject->getAsBoolean('testValueTrue')
		);
	}

	/**
	 * @test
	 */
	public function getAsBooleanCanReturnOneStringFromExtensionSettingsAsTrue() {
		$this->assertTrue(
			$this->subject->getAsBoolean('testValueOneInteger')
		);
	}

	/**
	 * @test
	 */
	public function getAsIntegerForMissingValueReturnsZero() {
		$this->assertSame(
			0,
			$this->subject->getAsInteger('foo')
		);
	}

	/**
	 * @test
	 */
	public function getAsIntegerForExistingValueReturnsValueFromExtensionSettings() {
		$this->assertSame(
			42,
			$this->subject->getAsInteger('testValuePositiveInteger')
		);
	}

	/**
	 * @test
	 */
	public function hasIntegerForZeroReturnsFalse() {
		$this->assertFalse(
			$this->subject->hasInteger('testValueZeroInteger')
		);
	}

	/**
	 * @test
	 */
	public function hasIntegerForPositiveIntegerReturnsTrue() {
		$this->assertTrue(
			$this->subject->hasInteger('testValuePositiveInteger')
		);
	}

	/**
	 * @test
	 */
	public function hasIntegerForNegativeIntegerReturnsTrue() {
		$this->assertTrue(
			$this->subject->hasInteger('testValueNegativeInteger')
		);
	}

	/**
	 * @test
	 */
	public function getAsStringForMissingValueReturnsEmptyString() {
		$this->assertSame(
			'',
			$this->subject->getAsString('foo')
		);
	}

	/**
	 * @test
	 */
	public function getAsStringForExistingValueReturnsValueFromExtensionSettings() {
		$this->assertSame(
			'Hello world!',
			$this->subject->getAsString('testValueString')
		);
	}

	/**
	 * @test
	 */
	public function getAsStringForExistingIntegerValueReturnsStringValueFromExtensionSettings() {
		$this->assertSame(
			'42',
			$this->subject->getAsString('testValuePositiveInteger')
		);
	}

	/**
	 * @test
	 */
	public function hasStringForEmptyStringReturnsFalse() {
		$this->assertFalse(
			$this->subject->hasString('testValueEmptyString')
		);
	}

	/**
	 * @test
	 */
	public function hasStringForNonEmptyStringReturnsTrue() {
		$this->assertTrue(
			$this->subject->hasString('testValueString')
		);
	}

	/**
	 * @test
	 */
	public function getAsArrayForMissingValueReturnsEmptyArray() {
		$this->assertSame(
			array(),
			$this->subject->getAsArray('foo')
		);
	}

	/**
	 * @test
	 */
	public function getAsArrayForExistingValueReturnsValueFromExtensionSettings() {
		$this->assertSame(
			array('foo', 'bar'),
			$this->subject->getAsArray('testValueArray')
		);
	}

	/**
	 * @test
	 */
	public function getAsArrayForExistingIntegerValueReturnsEmptyArray() {
		$this->assertSame(
			array(),
			$this->subject->getAsArray('testValuePositiveInteger')
		);
	}
}