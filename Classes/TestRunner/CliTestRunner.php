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
 * With this TestRunner, you can run PHPUnit manually from the command line.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Helmut Hummel <helmut.hummel@typo3.org>
 */
class Tx_Phpunit_TestRunner_CliTestRunner extends Tx_Phpunit_TestRunner_AbstractCliTestRunner
{
    /**
     * Runs PHPUnit.
     *
     * @return void
     */
    public function run()
    {
        // Store current TYPO3 configuration and set the default one
        // This is needed as the configuration might include closures which cannot be backed up
        $globalBackup = $this->removeClosures($GLOBALS['TYPO3_CONF_VARS']);

        // Run unit tests
        /** @var string */
        define('PHPUnit_MAIN_METHOD', 'PHPUnit_TextUI_Command::main');
        PHPUnit_TextUI_Command::main();

        // Restore configuration
        $GLOBALS['TYPO3_CONF_VARS'] = array_merge($GLOBALS['TYPO3_CONF_VARS'], $globalBackup);
    }

    /**
     * @param array $variables
     * @return array
     */
    protected function removeClosures(array &$variables)
    {
        $backup = array();
        foreach ($variables as $key => &$value) {
            if (!is_array($value) && !$value instanceof Closure) {
                continue;
            }
            if (is_array($value) && !empty($value)) {
                $valueBackup = $this->removeClosures($value);
                if (!empty($valueBackup)) {
                    $backup[$key] = $valueBackup;
                }
            } elseif ($value instanceof Closure) {
                $backup[$key] = $value;
                unset($variables[$key]);
            }
        }

        return $backup;
    }
}
