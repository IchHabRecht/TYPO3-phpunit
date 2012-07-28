<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2012 Helmut Hummel <helmut.hummel@typo3.org>
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
 * This class runs PHPUnit in CLI mode, and includes the
 * PHP file of an IDE so.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 */
class Tx_Phpunit_TestRunner_IdeTestRunner extends Tx_Phpunit_TestRunner_AbstractTestRunner {

	/**
	 * The constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->cli_help = array_merge(
			$this->cli_help,
			array(
				'name' => 'Tx_Phpunit_TestRunner_IdeTestRunner',
				'synopsis' => 'phpunit_ide_testrunner <test or test folder> ###OPTIONS###',
				'description' => 'This script should only be run through an IDE',
				'examples' => '',
				'author' => '(c) 2012 Helmut Hummel <helmut.hummel@typo3.org>',
			)
		);
	}

}

/* @var $phpUnit Tx_Phpunit_TestRunner_IdeTestRunner */
$phpUnit = t3lib_div::makeInstance('Tx_Phpunit_TestRunner_IdeTestRunner');

	// Shift away myself
array_shift($_SERVER['argv']);

	// Include the TestRunner of the IDE
$ideBootScript = array_shift($_SERVER['argv']);
if (!empty($ideBootScript)) {
	require($ideBootScript);
} else {
	throw new UnexpectedValueException('IDE Boot Script not found!', 1343498915);
}

?>