<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$composerAutoloadFile = t3lib_extMgm::extPath('phpunit') . 'Composer/vendor/autoload.php';

/** @var $extensionSettingsService Tx_Phpunit_Service_ExtensionSettingsService */
$extensionSettingsService = t3lib_div::makeInstance('Tx_Phpunit_Service_ExtensionSettingsService');
$composerPhpUnitPath = t3lib_extMgm::extPath('phpunit') . 'Composer/vendor/phpunit/phpunit/';
if ($extensionSettingsService->hasString('composerpath')) {
	$userComposerPath = rtrim(t3lib_div::fixWindowsFilePath($extensionSettingsService->getAsString('composerpath')), '/');
	if (is_dir($userComposerPath . '/vendor/') && is_file($userComposerPath . '/vendor/autoload.php')) {
		if (set_include_path($userComposerPath . PATH_SEPARATOR . get_include_path()) !== FALSE) {
			$composerAutoloadFile = $userComposerPath . '/vendor/autoload.php';
		}
	}
}
unset($extensionSettingsService);

require_once($composerAutoloadFile);
require_once(t3lib_extMgm::extPath('phpunit') . 'Migrations/vfsStream.php');

$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['Tx_Phpunit_BackEnd_Ajax'] =
	'typo3conf/ext/phpunit/Classes/BackEnd/Ajax.php:Tx_Phpunit_BackEnd_Ajax->ajaxBroker';

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['phpunit'] = array(
		'EXT:' . $_EXTKEY . '/Scripts/ManualCliTestRunner.php',
		'_CLI_phpunit',
	);
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['phpunit_ide_testrunner'] = array(
		'EXT:' . $_EXTKEY . '/Scripts/IdeTestRunner.php',
		'_CLI_phpunit',
	);
	if (method_exists(t3lib_extMgm, 'registerExtDirectComponent')) {
		t3lib_extMgm::registerExtDirectComponent(
			'TYPO3.Phpunit.JasmineExtDirect',
			t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Service/Jasmine/ExtDirectService.php:Tx_Phpunit_Service_Jasmine_ExtDirectService'
		);
	} else {
		/**
		 * Old style of ExtDirect registration. Can be dropped if the minimum
		 * TYPO3 version required for tx_phpunit would ever be 4.6 or higer
		 */
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ExtDirect']['TYPO3.Phpunit.JasmineExtDirect'] =
			t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Service/Jasmine/ExtDirectService.php:Tx_Phpunit_Service_Jasmine_ExtDirectService';
	}
}
?>