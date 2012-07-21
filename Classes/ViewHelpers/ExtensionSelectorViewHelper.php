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
	 * @var Tx_Phpunit_Service_TestFinder
	 */
	protected $testFinder = NULL;

	/**
	 * @var string
	 */
	protected $action = '';

	/**
	 * Injects the test finder.
	 *
	 * @param Tx_Phpunit_Service_TestFinder $testFinder
	 *
	 * @return void
	 */
	public function injectTestFinder($testFinder) {
		$this->testFinder = $testFinder;
	}

	/**
	 * Sets the action for the form.
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function setAction($action) {
		$this->action = $action;
	}

	/**
	 * Renders and outputs this view helper.
	 *
	 * @return void
	 */
	public function render() {
		$options = '<option class="alltests" value="uuall"' .
			($this->userSettingService->getAsString(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE) === Tx_Phpunit_Testable::ALL_EXTENSIONS ? ' selected="selected"' : '') .
			'>' . $GLOBALS['LANG']->getLL('all_extensions') . '</option>';

			// Render option tags for extensions
		$selectedExtensionStyle = '';
		$testables = $this->testFinder->getTestablesForEverything();
		/** @var  $testable Tx_Phpunit_Testable */
		foreach ($testables as $testable) {
				// Initialize variables
			$selected = '';
			$style = $this->createIconStyle($testable->getKey());

			if ($this->userSettingService->getAsString(Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE) === $testable->getKey()) {
				$selected = ' selected="selected"';
				$selectedExtensionStyle = $style;
			}

			$options .= '<option value="' . htmlspecialchars($testable->getKey()) . '" style="' . $style . '"' . $selected .
				'>' . htmlspecialchars($testable->getKey()) . '</option>';
		}
		unset($testable);

		$content = '<form action="' . htmlspecialchars($this->action) . '" method="post">' .
			'<p><select ' .
				'style="' . $selectedExtensionStyle . '" ' .
				'name="' . Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' .Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE . ']" ' .
				'onchange="jumpToUrl(\'' . htmlspecialchars($this->action) . '&amp;' .
					Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
					'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_TESTABLE . ']=' .
					'\'+this.options[this.selectedIndex].value,this);"' . '>' . $options . '</select> ' .
				'<button ' .
					'type="submit" ' .
					'name="' . Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
						'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_EXECUTE . ']" ' .
					'value="run" ' .
					'accesskey="a">' . $GLOBALS['LANG']->getLL('run_all_tests') . '</button>' .
				'<input ' .
					'type="hidden" ' .
					'name="' . Tx_Phpunit_Interface_Request::PARAMETER_NAMESPACE .
						'[' . Tx_Phpunit_Interface_Request::PARAMETER_KEY_COMMAND . ']" ' .
					'value="runalltests" />' .
			'</p></form>';

		$this->outputService->output($content);
	}
}
?>