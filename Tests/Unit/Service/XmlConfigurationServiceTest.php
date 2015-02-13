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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Test case.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Robert Wukitsevits <wukitech@gmx.net>
 */
class Tx_Phpunit_Service_XmlConfigurationServiceTest extends Tx_Phpunit_TestCase {
        /**
	 * @var Tx_Phpunit_Service_XmlConfigurationService
	 */
	protected $subject = NULL;

	/**
	 * the absolute path to the fixtures directory for this test case
	 *
	 * @var string
	 */
	private $fixturesPath = '';

	/**
	 * @var Tx_Phpunit_TestingDataContainer
	 */
	protected $userSettingsService = NULL;

	protected function setUp() {
		$this->subject = new Tx_Phpunit_Service_XmlConfigurationService();

		$this->fixturesPath = ExtensionManagementUtility::extPath('phpunit') . 'Tests/Unit/Service/Fixtures/';
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
	 *
	 * @expectedException UnexpectedValueException
         * @expectedExceptionCode 1418933134
	 */
	public function loadPhpUnitTestConfigurationWithInvalidPathThrowsException() {
		$this->subject->loadFile($this->fixturesPath . 'DoesNotExist/');
	}

        /**
	 * @test
	 */
	public function loadPhpUnitTestConfigurationWithValidPathFile() {
		$this->assertTrue(
                        $this->subject->loadFile($this->fixturesPath)
                );
	}

        /**
         * @test
         */
        public function getWhiteListFromPhpUnitTestConfigurationFile() {
                $whiteListExist = array(
			'.\typo3conf\ext\dhb_package_manager\Classes\Domain\Model',
			'.\typo3conf\ext\dhb_package_manager\Classes\Service',
                );
                $this->subject->loadFile($this->fixturesPath);
                $this->assertSame(
                        $whiteListExist,
                        $this->subject->getWhiteList()
                );
        }

        /**
         * @test
         */
        public function getBlackListFromPhpUnitTestConfigurationFile() {
                $blackListExist = array(
			'.\typo3conf\ext\dhb_package_manager\Classes\Domain\Repository',
			'.\typo3conf\ext\dhb_package_manager\Classes\ViewHelpers',
                        '.\path\to\whitefile1',
                        '.\path\to\whitefile2',
                );
                $this->subject->loadFile($this->fixturesPath);
                $this->assertSame(
                        $blackListExist,
                        $this->subject->getBlackList()
                );
        }
}