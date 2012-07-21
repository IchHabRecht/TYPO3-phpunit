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
 * This class is the base class for all view helpers which render some select boxes.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Nicole Cordes <nicole.cordes@googlemail.com>
 */
abstract class Tx_Phpunit_ViewHelpers_AbstractSelectorViewHelper extends Tx_Phpunit_ViewHelpers_AbstractViewHelper {
	/**
	 * @var Tx_Phpunit_Service_UserSettingsService
	 */
	protected $userSettingService = NULL;

	/**
	 * @var Tx_Phpunit_Service_TestFinder
	 */
	protected $testFinder = NULL;

	/**
	 * @var string
	 */
	protected $action = '';

	/**
	 * The destructor.
	 */
	public function __destruct() {
		unset($this->userSettingService, $this->testFinder);
		parent::__destruct();
	}

	/**
	 * Injects the user setting service.
	 *
	 * @param Tx_Phpunit_Service_UserSettingsService $userSettingService
	 *
	 * @return void
	 */
	public function injectUserSettingService($userSettingService) {
		$this->userSettingService = $userSettingService;
	}

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
	 * Expects the link as string value which gets parsed by htmlspecialchars function.
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function setAction($action) {
		$this->action = $action;
	}

	/**
	 * Gets the action of the form.
	 *
	 * @return string
	 */
	public function getAction() {
		return $this->action;
	}

	/**
	 * Creates the CSS style attribute content for an icon for the extension
	 * $extensionKey.
	 *
	 * @param string $extensionKey
	 *        the key of a loaded extension, may also be "typo3", must bot be empty
	 *
	 * @return string the content for the "style" attribute, will not be empty
	 *
	 * @throws InvalidArgumentException
	 *         if there is not extension with tests with the given key
	 */
	protected function createIconStyle($extensionKey) {
		if ($extensionKey === '') {
			throw new InvalidArgumentException('$extensionKey must not be empty.', 1303503647);
		}
		if (!$this->testFinder->existsTestableForKey($extensionKey)) {
			throw new InvalidArgumentException('The extension ' . $extensionKey . ' is not loaded.', 1303503664);
		}

		$testable = $this->testFinder->getTestableForKey($extensionKey);

		return 'background: url(' . urlencode($testable->getIconPath()) . ') 3px 50% white no-repeat; padding: 1px 1px 1px 24px;';
	}

	/**
	 * Gets all options rendered as an array.
	 *
	 * @abstract
	 *
	 * @return array
	 */
	abstract protected function getOptions();

	/**
	 * Renders any html tag with it's own paramter either around some content.
	 * If content is empty the tag gets closed properly.
	 *
	 * @param string $tagName
	 * @param array $parameter
	 * @param string $content
	 *
	 * @return string
	 */
	protected function renderTag($tagName, $parameter = array(), $content = '') {
		$output =  '<' . $tagName;

		foreach ($parameter as $key => $value) {
			$output .= ' ' . $key . '="' . $value . '"';
		}

		if (!empty($content)) {
			$output .= '>' . $content . '</' . $tagName . '>';
		} else {
			$output .= ' />';
		}

		return $output;
	}
}
?>