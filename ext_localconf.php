<?php
defined('TYPO3_MODE') or die('Access denied.');

if (!interface_exists('PHPUnit_Exception')) {
	require_once(__DIR__ . '/Resources/Private/Libraries/phpunit-library.phar');
}

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('phpunit') . 'Migrations/vfsStream.php');

$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['Tx_Phpunit_BackEnd_Ajax'] =
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('phpunit') . 'Classes/BackEnd/Ajax.php:Tx_Phpunit_BackEnd_Ajax->ajaxBroker';

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['phpunit'] = array(
		'EXT:' . $_EXTKEY . '/Scripts/ManualCliTestRunner.php',
		'_CLI_phpunit',
	);
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['phpunit_ide_testrunner'] = array(
		'EXT:' . $_EXTKEY . '/Scripts/IdeTestRunner.php',
		'_CLI_phpunit',
	);
}