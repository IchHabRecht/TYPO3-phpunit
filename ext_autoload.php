<?php
$extensionPath = t3lib_extMgm::extPath('phpunit');
return array(
	'tx_phpunit_abstractdatacontainer' => $extensionPath . 'Classes/AbstractDataContainer.php',
	'tx_phpunit_backend_ajax' => $extensionPath . 'Classes/BackEnd/Ajax.php',
	'tx_phpunit_backend_module' => $extensionPath . 'Classes/BackEnd/Module.php',
	'tx_phpunit_backend_request' => $extensionPath . 'Classes/BackEnd/Request.php',
	'tx_phpunit_backend_testlistener' => $extensionPath . 'Classes/BackEnd/TestListener.php',
	'tx_phpunit_backend_teststatistics' => $extensionPath . 'Classes/BackEnd/TestStatistics.php',
	'tx_phpunit_database_testcase' => $extensionPath . 'Classes/Database/TestCase.php',
	'tx_phpunit_exception_database' => $extensionPath . 'Classes/Exception/Database.php',
	'tx_phpunit_exception_emptyqueryresult' => $extensionPath . 'Classes/Exception/EmptyQueryResult.php',
	'tx_phpunit_exception_notestsdirectory' => $extensionPath . 'Classes/Exception/NoTestsDirectory.php',
	'tx_phpunit_framework' => $extensionPath . 'Classes/Framework.php',
	'tx_phpunit_interface_accessibleobject' => $extensionPath . 'Classes/Interface/AccessibleObject.php',
	'tx_phpunit_interface_convertservice' => $extensionPath . 'Classes/Interface/ConvertService.php',
	'tx_phpunit_interface_extensionsettingsservice' => $extensionPath . 'Classes/Interface/ExtensionSettingsService.php',
	'tx_phpunit_interface_frameworkcleanuphook' => $extensionPath . 'Classes/Interface/FrameworkCleanupHook.php',
	'tx_phpunit_interface_request' => $extensionPath . 'Classes/Interface/Request.php',
	'tx_phpunit_interface_usersettingsservice' => $extensionPath . 'Classes/Interface/UserSettingsService.php',
	'tx_phpunit_reports_status' => $extensionPath . 'Classes/Reports/Status.php',
	'tx_phpunit_selenium_testcase' => $extensionPath . 'Classes/Selenium/TestCase.php',
	'tx_phpunit_service_database' => $extensionPath . 'Classes/Service/Database.php',
	'tx_phpunit_service_extensionsettingsservice' => $extensionPath . 'Classes/Service/ExtensionSettingsService.php',
	'tx_phpunit_service_fakeoutputservice' => $extensionPath . 'Classes/Service/FakeOutputService.php',
	'tx_phpunit_service_outputservice' => $extensionPath . 'Classes/Service/OutputService.php',
	'tx_phpunit_service_testcaseservice' => $extensionPath . 'Classes/Service/TestCaseService.php',
	'tx_phpunit_service_testfinder' => $extensionPath . 'Classes/Service/TestFinder.php',
	'tx_phpunit_service_usersettingsservice' => $extensionPath . 'Classes/Service/UserSettingsService.php',
	'tx_phpunit_testable' => $extensionPath . 'Classes/Testable.php',
	'tx_phpunit_testcase' => $extensionPath . 'Classes/TestCase.php',
	'tx_phpunit_testrunner_abstractclitestrunner' => $extensionPath . 'Classes/TestRunner/AbstractCliTestRunner.php',
	'tx_phpunit_testrunner_clitestrunner' => $extensionPath . 'Classes/TestRunner/CliTestRunner.php',
	'tx_phpunit_testrunner_idetestrunner' => $extensionPath . 'Classes/TestRunner/IdeTestRunner.php',
	'tx_phpunit_testingdatacontainer' => $extensionPath . 'Classes/TestingDataContainer.php',
	'tx_phpunit_test_testsuite' => $extensionPath . 'Tests/tx_phpunit_testsuite.php',
	'tx_phpunit_viewhelpers_abstractselectorviewhelper' => $extensionPath . '/Classes/ViewHelpers/AbstractSelectorViewHelper.php',
	'tx_phpunit_viewhelpers_abstractviewhelper' => $extensionPath . 'Classes/ViewHelpers/AbstractViewHelper.php',
	'tx_phpunit_viewhelpers_extensionselectorviewhelper' => $extensionPath . 'Classes/ViewHelpers/ExtensionSelectorViewHelper.php',
	'tx_phpunit_viewhelpers_progressbarviewhelper' => $extensionPath . 'Classes/ViewHelpers/ProgressBarViewHelper.php',
	'tx_phpunit_service_jasmine_specrunnerwriterservice' => $extensionPath . 'Classes/Service/Jasmine/SpecRunnerWriterService.php',
	'tx_phpunit_service_jasmine_testfinderservice' => $extensionPath . 'Classes/Service/Jasmine/TestFinderService.php'
);
?>