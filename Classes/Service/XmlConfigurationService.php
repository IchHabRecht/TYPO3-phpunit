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

use TYPO3\CMS\Core\SingletonInterface;

/**
 * This class provides functions for reading and writing the settings of the back-end user who is currently logged in.
 *
 * This class may only be used when a back-end user is logged in.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Robert Wukitsevits <wukitech@gmx.net>
 */
class Tx_Phpunit_Service_XmlConfigurationService implements SingletonInterface
{
	/**
	 * @var string
	 */
	const PHPUNIT_XML_CONFIGURATION_FILE = 'phpunit.xml';

        /**
         * @var \SimpleXMLElement
         */
        protected $xmlPhpunit=NULL;

        /**
         * Loads the XML configuration file with the name phpunit.xml
         *
         * Details for the structure of the XML file can be found at
         * @see https://phpunit.de/manual/current/en/appendixes.configuration.html
         *
         * @param string $absoluteDirectoryPath
         *
         * @return bool If the file was loaded successful (true) or in case of error (false)
         *
         * @throws Exception 1418933134 There have to be a file like phpunit.xml
         */
        public function loadFile($absoluteDirectoryPath) {
            $file = $absoluteDirectoryPath . self::PHPUNIT_XML_CONFIGURATION_FILE;
            if (!is_readable($file)) {
                throw new UnexpectedValueException('No XML cofiguration file found (file:' . $file . ').', 1418933134);
            }
            $this->xmlPhpunit = simplexml_load_file($file);
            if ($this->xmlPhpunit instanceof SimpleXMLElement) {
                return true;
            }
            return false;
        }

        /**
         * Extract the white list from the phpunit XML configuration file
         *
         * @return array strings with the path/file names
         */
        public function getWhitelist() {
            $list = array();

            if ($this->xmlPhpunit instanceof SimpleXMLElement) {
                foreach ($this->xmlPhpunit->filter->whitelist->directory as $directory) {
                    $this->addAttributesAsElementIndicesToArray($list, $directory, 'suffix');
                }

                foreach ($this->xmlPhpunit->filter->whitelist->file as $file) {
                    array_push($list, (string)$file);
                }
            }

            return $list;
        }

        /**
         * Extract the black list from the phpunit XML configuration file
         *
         * @remark currently the blacklist feature is not supported form class PHP_CodeCoverage_Filter
         * @return array strings with the path/file names
         */
        public function getBlacklist() {
            $list = array();

            foreach ($this->xmlPhpunit->filter->blacklist->directory as $directory) {
                $this->addAttributesAsElementIndicesToArray($list, $directory, 'suffix');
            }

            foreach ($this->xmlPhpunit->filter->blacklist->file as $file) {
                array_push($list, (string)$file);
            }

            return $list;
        }


        private function addAttributesAsElementIndicesToArray(&$list, $element/*, $indices*/) {
            //$value = (string)$element;
            array_push($list, (string)$element);
            /*
            switch((string) $element[$indices]) { // Get attributes as element indices
                case '.php':
                    array_push($list, (string)$element);
                    break;
                default:
                    array_push($list, (string)$element);
                    break;
            }*/
        }
}