<?php
/***************************************************************
 *  Copyright notice
 *
 * (c) 2012 Nicole Cordes <nicole.cordes@googlemail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * This view helper renders the extension selector box.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Nicole Cordes <nicole.cordes@googlemail.com>
 */
class Tx_Phpunit_ViewHelpers_ExtensionSelectorViewHelper extends Tx_Phpunit_ViewHelpers_AbstractSelectorViewHelper {

	/**
	 * Renders the content of the viewhelper and pushes it to the output service.
	 *
	 * @return void
	 */
	public function render() {
		$content = $this->renderSelect();

			// Add hidden field
		$content .= $this->renderTag(
			'input',
			array(
				'name' => Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_COMMAND . ']',
				'type' => 'hidden',
				'value' => 'runalltests'
			)
		);

			// Add button tag
		$content .= $this->renderTag(
			'button',
			array(
				'accesskey' => 'a',
				'name' => Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_EXECUTE . ']',
				'type' => 'submit',
				'value' => 'run'
			),
			$GLOBALS['LANG']->getLL('run_all_tests')
		);

			// Surround with paragraph
		$content = $this->renderTag('p', array(), $content);

			// Surround with form
		$content = $this->renderTag(
			'form',
			array(
				'action' => htmlspecialchars($this->action),
				'method' => 'post'
			),
			$content
		);

		$this->outputService->output($content);
	}

	/**
	 * Gets all options rendered as an array
	 *
	 * @return array all option parameter as a multi-dimensional array
	 */
	protected function getOptions() {
		$options = array();

		$allExtensionParameters = array(
			'class' => 'alltests',
			'value' => 'uuall'
		);
		if ($this->userSettingService->getAsString(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE) === Tx_Phpunit_Testable::ALL_EXTENSIONS) {
			$allExtensionParameters['selected'] = 'selected';
		}
		$options[] = $allExtensionParameters;

			// Render option tags for each extension
		$testables = $this->testFinder->getTestablesForEverything();
		/** @var $testable Tx_Phpunit_Testable */
		foreach ($testables as $testable) {
			$extensionParameters = array(
				'style' => $this->createIconStyle($testable->getKey(), FALSE),
				'value' => htmlspecialchars($testable->getKey())
			);
			if ($this->userSettingService->getAsString(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE) === $testable->getKey()) {
				$extensionParameters['selected'] = 'selected';
			}

			$options[] = $extensionParameters;
		}

		return $options;
	}

	/**
	 * Renders the select box as HTML string.
	 *
	 * @return string the select box as HTML string
	 */
	protected function renderSelect() {
		$content = '';

		$options = $this->getOptions();
		$selectedExtensionStyle = '';
		foreach ($options as $option) {
			if (isset($option['selected']) && $option['selected'] === 'selected') {
				$selectedExtensionStyle = $option['style'];
			}
			if ($option['value'] == Tx_Phpunit_Testable::ALL_EXTENSIONS) {
				$value = $GLOBALS['LANG']->getLL('all_extensions');
			} else {
				$value = $option['value'];
			}
			$content .= $this->renderTag('option', $option, $value);
		}

		$content = $this->renderTag(
			'select',
			array(
				'name' => Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE . ']',
				'onchange' => 'jumpToUrl(\'' . $this->action . '&' .
					Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE . ']=' .
					'\'+this.options[this.selectedIndex].value,this);',
				'style' => $selectedExtensionStyle
			),
			$content
		);

		return $content;
	}
}

?>