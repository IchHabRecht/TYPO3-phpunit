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
 * This view helper renders an input field of type checkbox.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Felix Rauch <rauch@skaiamail.de>
 */
class Tx_Phpunit_ViewHelpers_CheckboxViewHelper extends Tx_Phpunit_ViewHelpers_AbstractTagViewHelper
{
    /**
     * @var string
     */
    protected $tagName = 'input';

    /**
     * Any additional attributes can be set here. They are resolved as key="value" in the resulting tag.
     *
     * Note: The keys "type" and "value" are reserved and will be overridden by the ViewHelper properties.
     *
     * @var array
     */
    protected $additionalAttributes = array();

    /**
     * @var string
     */
    protected $type = 'checkbox';

    /**
     * According to HTML spec, an <input> element of type "checkbox" must have a value attribute (even if it is empty).
     *
     * @var string
     */
    protected $value = '';

    /**
     * Tx_Phpunit_ViewHelpers_CheckboxViewHelper constructor.
     *
     * @param string $value
     * @param array $additionalAttributes
     */
    public function __construct($value = '', array $additionalAttributes = array())
    {
        $this->value = $value;
        $this->additionalAttributes = $additionalAttributes;
    }

    /**
     * Renders the input field with the set attributes and value
     *
     * @return string
     */
    public function render()
    {
        $attributes = array_merge(
            $this->additionalAttributes,
            array(
                'type' => $this->type,
                'value' => $this->value,
            )
        );

        return $this->renderTag(
            $this->tagName,
            $attributes
        );
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function getAdditionalAttributes()
    {
        return $this->additionalAttributes;
    }

    /**
     * @param array $additionalAttributes
     */
    public function setAdditionalAttributes($additionalAttributes)
    {
        $this->additionalAttributes = $additionalAttributes;
    }

    /**
     * Adds the given array of additional attributes to the existing additional attributes.
     * If keys are duplicated, this function will override the existing key.
     *
     * @param array $additionalAttributes
     */
    public function addAdditionalAttributes($additionalAttributes)
    {
        $this->additionalAttributes = array_merge($this->additionalAttributes, $additionalAttributes);
    }
}