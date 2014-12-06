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

use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;

/**
 * Test case.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Phpunit_Service_UserSettingsServiceTest extends Tx_Phpunit_TestCase {
	/**
	 * @var Tx_Phpunit_Service_UserSettingsService
	 */
	protected $subject = NULL;

	/**
	 * backup of $GLOBALS['BE_USER']
	 *
	 * @var BackendUserAuthentication
	 */
	private $backEndUserBackup = NULL;

	protected function setUp() {
		$this->backEndUserBackup = $GLOBALS['BE_USER'];
		$GLOBALS['BE_USER'] = $this->getMock('TYPO3\\CMS\\Core\\Authentication\\BackendUserAuthentication');

		$this->subject = new Tx_Phpunit_Service_UserSettingsService();
	}

	protected function tearDown() {
		$GLOBALS['BE_USER'] = $this->backEndUserBackup;
	}

	/**
	 * Returns $GLOBALS['BE_USER'].
	 *
	 * @return BackendUserAuthentication|PHPUnit_Framework_MockObject_MockObject
	 */
	protected function getBackEndUserMock() {
		return $GLOBALS['BE_USER'];
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
	public function classIsSingletonUserSettings() {
		$this->assertInstanceOf(
			'Tx_Phpunit_Interface_UserSettingsService',
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
	public function getAsBooleanCanReturnFalseFromUserSettings() {
		$key = 'foo';
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = FALSE;

		$this->assertFalse(
			$this->subject->getAsBoolean($key)
		);
	}

	/**
	 * @test
	 */
	public function getAsBooleanCanReturnTrueFromUserSettings() {
		$key = 'foo';
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = TRUE;

		$this->assertTrue(
			$this->subject->getAsBoolean($key)
		);
	}

	/**
	 * @test
	 */
	public function getAsBooleanCanReturnOneStringFromUserSettingsAsTrue() {
		$key = 'foo';
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = '1';

		$this->assertTrue(
			$this->subject->getAsBoolean($key)
		);
	}

	/**
	 * @test
	 */
	public function setCanSetBooleanValueToFalse() {
		$key = 'foo';
		$this->subject->set($key, FALSE);

		$this->assertFalse(
			$this->subject->getAsBoolean($key)
		);
	}

	/**
	 * @test
	 */
	public function setCanSetBooleanValueToTrue() {
		$key = 'foo';
		$this->subject->set($key, TRUE);

		$this->assertTrue(
			$this->subject->getAsBoolean($key)
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
	public function getAsIntegerForExistingValueReturnsValueFromUserSettings() {
		$key = 'foo';
		$value = 42;
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = $value;

		$this->assertSame(
			$value,
			$this->subject->getAsInteger($key)
		);
	}

	/**
	 * @test
	 */
	public function getAsIntegerForExistingStringValueReturnsIntegerValueFromUserSettings() {
		$key = 'foo';
		$value = 42;
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = (string) $value;

		$this->assertSame(
			$value,
			$this->subject->getAsInteger($key)
		);
	}

	/**
	 * @test
	 */
	public function setCanSetIntegerValue() {
		$key = 'foo';
		$value = 9;
		$this->subject->set($key, $value);

		$this->assertSame(
			$value,
			$this->subject->getAsInteger($key)
		);
	}

	/**
	 * @test
	 */
	public function hasIntegerForZeroReturnsFalse() {
		$key = 'foo';
		$value = 0;
		$this->subject->set($key, $value);

		$this->assertFalse(
			$this->subject->hasInteger($key)
		);
	}

	/**
	 * @test
	 */
	public function hasIntegerForPositiveIntegerReturnsTrue() {
		$key = 'foo';
		$value = 2;
		$this->subject->set($key, $value);

		$this->assertTrue(
			$this->subject->hasInteger($key)
		);
	}

	/**
	 * @test
	 */
	public function hasIntegerForNegativeIntegerReturnsTrue() {
		$key = 'foo';
		$value = -1;
		$this->subject->set($key, $value);

		$this->assertTrue(
			$this->subject->hasInteger($key)
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
	public function getAsStringForExistingValueReturnsValueFromUserSettings() {
		$key = 'foo';
		$value = 'bar';
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = $value;

		$this->assertSame(
			$value,
			$this->subject->getAsString($key)
		);
	}

	/**
	 * @test
	 */
	public function getAsStringForExistingIntegerValueReturnsStringValueFromUserSettings() {
		$key = 'foo';
		$value = '42';
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = (int)$value;

		$this->assertSame(
			$value,
			$this->subject->getAsString($key)
		);
	}

	/**
	 * @test
	 */
	public function setCanSetStringValue() {
		$key = 'foo';
		$value = 'Hello world!';
		$this->subject->set($key, $value);

		$this->assertSame(
			$value,
			$this->subject->getAsString($key)
		);
	}

	/**
	 * @test
	 */
	public function hasStringForEmptyStringReturnsFalse() {
		$key = 'foo';
		$value = '';
		$this->subject->set($key, $value);

		$this->assertFalse(
			$this->subject->hasString($key)
		);
	}

	/**
	 * @test
	 */
	public function hasStringForNonEmptyStringReturnsTrue() {
		$key = 'foo';
		$value = 'bar';
		$this->subject->set($key, $value);

		$this->assertTrue(
			$this->subject->hasString($key)
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
	public function getAsArrayForExistingValueReturnsValueFromUserSettings() {
		$key = 'foo';
		$value = array('foo', 'bar');
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = $value;

		$this->assertSame(
			$value,
			$this->subject->getAsArray($key)
		);
	}

	/**
	 * @test
	 */
	public function getAsArrayForExistingIntegerValueReturnsEmptyArray() {
		$key = 'foo';
		$this->getBackEndUserMock()->uc['Tx_Phpunit_BackEndSettings'][$key] = 42;

		$this->assertSame(
			array(),
			$this->subject->getAsArray($key)
		);
	}

	/**
	 * @test
	 */
	public function setCanSetArrayValue() {
		$key = 'foo';
		$value = array('hello', 'world');
		$this->subject->set($key, $value);

		$this->assertSame(
			$value,
			$this->subject->getAsArray($key)
		);
	}

	/**
	 * @test
	 */
	public function setWritesUserSettings() {
		$this->getBackEndUserMock()->expects($this->once())->method('writeUC');

		$this->subject->set('foo', 'bar');
	}
}