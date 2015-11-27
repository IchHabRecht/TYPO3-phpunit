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
 * Fixture class for Tx_Phpunit_ViewHelpers_AbstractTagViewHelper.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Felix Rauch <rauch@skaiamail.de>
 */
class Tx_Phpunit_Tests_Unit_ViewHelpers_Fixtures_TestingTagViewHelper extends Tx_Phpunit_ViewHelpers_AbstractTagViewHelper
{
    /**
     * This method does nothing.
     *
     * @return string
     */
    public function render()
    {
        return '';
    }

    /**
     * This method calls the renderTag method of the abstract class
     *
     * @param string $tagName
     * @param array $attributes
     * @param string $content
     * @return string
     */
    public function renderTag($tagName, array $attributes = array(), $content = '')
    {
        return parent::renderTag($tagName, $attributes, $content);
    }
}