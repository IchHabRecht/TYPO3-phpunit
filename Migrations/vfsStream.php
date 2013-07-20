<?php

$vfsStreamPath = t3lib_extMgm::extPath('phpunit') . 'Composer/vendor/mikey179/vfsStream/src/main/php/org/bovigo/vfs/';
require_once($vfsStreamPath . 'vfsStream.php');
require_once($vfsStreamPath . 'vfsStreamContent.php');
require_once($vfsStreamPath . 'vfsStreamAbstractContent.php');
require_once($vfsStreamPath . 'vfsStreamContainer.php');
require_once($vfsStreamPath . 'vfsStreamDirectory.php');
require_once($vfsStreamPath . 'DotDirectory.php');
require_once($vfsStreamPath . 'vfsStreamContainerIterator.php');
require_once($vfsStreamPath . 'vfsStreamException.php');
require_once($vfsStreamPath . 'vfsStreamFile.php');
require_once($vfsStreamPath . 'vfsStreamWrapper.php');

interface vfsStreamContainer extends \org\bovigo\vfs\vfsStreamContainer {}

interface vfsStreamContent extends \org\bovigo\vfs\vfsStreamContent {}

abstract class vfsStreamAbstractContent extends \org\bovigo\vfs\vfsStreamAbstractContent {}

class vfsStream extends \org\bovigo\vfs\vfsStream {}

class vfsStreamContainerIterator extends \org\bovigo\vfs\vfsStreamContainerIterator {}

class vfsStreamDirectory extends \org\bovigo\vfs\vfsStreamDirectory {}

class vfsStreamException extends \org\bovigo\vfs\vfsStreamException {}

class vfsStreamFile extends \org\bovigo\vfs\vfsStreamFile {}

class vfsStreamWrapper extends \org\bovigo\vfs\vfsStreamWrapper {}

?>