<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	t3lib_extMgm::addModule('tools', 'txphpunitbeM1', '', t3lib_extMgm::extPath($_EXTKEY) . 'Classes/BackEnd/');

	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['PHPUnit'][] = 'Tx_Phpunit_Reports_Status';
}
?>