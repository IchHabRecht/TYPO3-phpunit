<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$TCA['tx_bbb_test'] = array(
	'ctrl' => $TCA['tx_bbb_test']['ctrl'],
	'columns' => array(
		'hidden' => array(
			'config' => array(
				'type'	=> 'check',
			)
		),
	),
);