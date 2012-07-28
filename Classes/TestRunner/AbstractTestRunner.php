<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2009-2012 AOE media GmbH <dev@aoemedia.de>
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

if (!defined('TYPO3_cliMode')) {
	die('Access denied: CLI only.');
}

/**
 * This class runs PHPUnit in CLI mode.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Michael Klapper <michael.klapper@aoemedia.de>
 */
abstract class Tx_Phpunit_TestRunner_AbstractTestRunner extends t3lib_cli {
	/**
	 * definition of the extension name
	 *
	 * @var string
	 */
	protected $extKey = 'phpunit_cli';

	/**
	 * The constructor.
	 */
	public function __construct() {
		setlocale(LC_NUMERIC, 'C');

		parent::__construct();

		$this->cli_options = array_merge($this->cli_options, array());
		$this->cli_help = array_merge(
			$this->cli_help,
			array(
				'name' => 'Tx_Phpunit_TestRunner_CliTestRunner',
				'synopsis' => $this->extKey . ' <test or test folder> ###OPTIONS###',
				'description' => 'This script can execute TYPO3 unit tests using PHPUnit',
				'examples' => 'typo3/cli_dispatch.phpsh ' . $this->extKey .' tests',
				'author' => '(c) 2009-2012 AOE media GmbH <dev@aoemedia.de>',
			)
		);
	}
}

?>