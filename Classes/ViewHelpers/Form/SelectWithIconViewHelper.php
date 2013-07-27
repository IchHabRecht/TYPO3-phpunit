<?php
/**
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
 * View helper for select icons.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Rens Admiraal <rens.admiraal@typo3.org>
 */
class Tx_Phpunit_ViewHelpers_Form_SelectWithIconViewHelper extends Tx_Fluid_ViewHelpers_Form_SelectViewHelper {
	/**
	 * Renders the option tags.
	 *
	 * @return array[] an associative array of options, key will be the value of the option tag.
	 */
	protected function getOptions() {
		if (!is_array($this->arguments['options']) && !($this->arguments['options'] instanceof Traversable)) {
			return array();
		}

		$options = array();
		foreach ($this->arguments['options'] as $key => $value) {
			if (!empty($this->arguments['optionValueField'])) {
				$key = $value[$this->arguments['optionValueField']];
			}

			if (!empty($this->arguments['optionLabelField'])) {
				$value = array(
					'icon' => !empty($value['icon']) ? $value['icon'] : NULL,
					'label' => $value[$this->arguments['optionLabelField']],
				);
			}

			$options[$key] = $value;
		}

		return $options;
	}

	/**
	 * Renders one option tag.
	 *
	 * @param string $value value attribute of the option tag (will be escaped).
	 * @param string[] $labels content of the option tag (will be escaped).
	 * @param bool $isSelected specifies whether or not to add selected attribute.
	 *
	 * @return string the rendered option tag
	 */
	protected function renderOptionTag($value, array $labels, $isSelected) {
		$background = 'background: white;';
		if (!empty($labels['icon'])) {
			$background = 'background: white no-repeat url(\'' . $labels['icon'] . '\') 3px 50%; ';
		}

		$output = '<option value="' . htmlspecialchars($value) . '"';
		if ($isSelected) {
			$output .= ' selected="selected"';
		}
		$output .= ' style="' . $background . 'padding: 1px 1px 1px 24px;">' . htmlspecialchars($labels['label']) .
			'</option>';

		return $output;
	}
}