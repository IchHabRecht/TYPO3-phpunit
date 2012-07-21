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
	 * Gets all options rendered as an array
	 *
	 * @return array|void
	 */
	protected function getOptions() {
		$options = array();

			// Render option tag for "all extensions"
		$parameterArray = array(
			'class' => 'alltests',
			'value' => 'uuall'
		);
		if ($this->userSettingService->getAsString(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE) === Tx_Phpunit_Testable::ALL_EXTENSIONS) {
			$parameterArray['selected'] = 'selected';
		}
		$options[] = $this->renderTag('option', $parameterArray, $GLOBALS['LANG']->getLL('all_extensions'));

			// Render option tags for each extension
		$testables = $this->testFinder->getTestablesForEverything();
		/** @var $testable Tx_Phpunit_Testable */
		foreach ($testables as $testable) {
			$parameterArray = array(
				'style' => $this->createIconStyle($testable->getKey()),
				'value' => htmlspecialchars($testable->getKey())
			);
			if ($this->userSettingService->getAsString(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE) === $testable->getKey()) {
				$parameterArray['selected'] = 'selected';
			}

			$options[] = $this->renderTag('option', $parameterArray, htmlspecialchars($testable->getKey()));
		}

		return $options;
	}
	/**
	 * Renders and outputs this view helper.
	 *
	 * @return void
	 */
	public function render() {
			// Get all options
		$options = $this->getOptions();

			// Get selectbox style and render select tag
		$selectStyle = '';
		foreach ($options as $option) {
			$strpos = strpos($option, 'selected="selected"');
			if (strpos($option, 'selected="selected"') !== FALSE) {
				preg_match('/style="([^"]*)"/', $option, $matches);
				$selectStyle = $matches[1];
				break;
			}
		}

		$content = $this->renderTag(
			'select',
			array(
				'name' => Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' .Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE . ']',
				'onchange' => 'jumpToUrl(\'' . htmlspecialchars($this->action) . '&amp;' .
					Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE . ']=' .
					'\'+this.options[this.selectedIndex].value,this);',
				'style' => $selectStyle
			),
			implode('', $options)
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
}
?>