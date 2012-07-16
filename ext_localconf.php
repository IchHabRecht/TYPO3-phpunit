<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

/** @var $extensionSettingsService Tx_Phpunit_Service_ExtensionSettingsService */
$extensionSettingsService = t3lib_div::makeInstance('Tx_Phpunit_Service_ExtensionSettingsService');
if ($extensionSettingsService->hasString('phpunitlib')
	&& is_dir($extensionSettingsService->getAsString('phpunitlib') . PATH_SEPARATOR . 'PHPUnit')
) {
	$phpunitlib = $extensionSettingsService->getAsString('phpunitlib') . PATH_SEPARATOR;
} else {
	$phpunitlib = t3lib_extMgm::extPath('phpunit') . 'PEAR/';
}
unset($extensionSettingsService);

define(TX_PHPUNITLIB_EXTPATH, $phpunitlib);
set_include_path(TX_PHPUNITLIB_EXTPATH . PATH_SEPARATOR . get_include_path());
unset($phpunitlib);

$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['Tx_Phpunit_BackEnd_Ajax']
	= 'typo3conf/ext/phpunit/Classes/BackEnd/Ajax.php:Tx_Phpunit_BackEnd_Ajax->ajaxBroker';

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys'][$_EXTKEY] = array(
		'EXT:' . $_EXTKEY . '/Classes/Cli/TestRunner.php',
		'_CLI_phpunit',
	);
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys'][$_EXTKEY . '_ide'] = array(
		'EXT:' . $_EXTKEY . '/Classes/Cli/TestRunnerIde.php',
		'_CLI_phpunit'
	);
}
?>