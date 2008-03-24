<?php

########################################################################
# Extension Manager/Repository config file for ext: "phpunit"
#
# Auto generated 24-03-2008 18:19
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'PHPUnit',
	'description' => 'TYPO3 unit testing UI based on PHPUnit ver. 3.2 by Sebastian Bergmann. Part of the ECT effort (Extension Coordination Team).',
	'category' => 'module',
	'shy' => 0,
	'version' => '3.2.4',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => 'mod1',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Kasper Ligaard',
	'author_email' => 'ligaard@systime.dk',
	'author_company' => 'GT3',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.1-0.0.0',
			'typo3' => '4.1-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'pear' => '2.3.5-0.0.0',
		),
	),
	'_md5_values_when_last_written' => 'a:399:{s:9:"Changelog";s:4:"d41d";s:4:"NEWS";s:4:"1ad2";s:4:"TODO";s:4:"c984";s:29:"class.tx_phpunit_testcase.php";s:4:"c1da";s:33:"class.tx_phpunit_testlistener.php";s:4:"b4ac";s:21:"ext_conf_template.txt";s:4:"7a11";s:12:"ext_icon.gif";s:4:"420a";s:17:"ext_localconf.php";s:4:"03b1";s:14:"ext_tables.php";s:4:"1412";s:12:"pear-phpunit";s:4:"ed3f";s:16:"pear-phpunit.bat";s:4:"1f2d";s:14:"doc/manual.sxw";s:4:"bb1d";s:36:"PHPUnit-3.2.16/PHPUnit/Framework.php";s:4:"b119";s:46:"PHPUnit-3.2.16/PHPUnit/Samples/FailureTest.php";s:4:"34b6";s:60:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccountDB/BankAccount.php";s:4:"f6f3";s:66:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccountDB/BankAccountDBTest.php";s:4:"5214";s:71:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccountDB/BankAccountDBTestMySQL.php";s:4:"e26c";s:83:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccountDB/_files/bank-account-after-deposits.xml";s:4:"c0c4";s:86:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccountDB/_files/bank-account-after-new-account.xml";s:4:"2f81";s:86:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccountDB/_files/bank-account-after-withdrawals.xml";s:4:"b8fd";s:73:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccountDB/_files/bank-account-seed.xml";s:4:"344f";s:58:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccount/BankAccount.php";s:4:"1d08";s:62:"PHPUnit-3.2.16/PHPUnit/Samples/BankAccount/BankAccountTest.php";s:4:"7206";s:47:"PHPUnit-3.2.16/PHPUnit/Samples/Money/IMoney.php";s:4:"855b";s:46:"PHPUnit-3.2.16/PHPUnit/Samples/Money/Money.php";s:4:"4ca2";s:49:"PHPUnit-3.2.16/PHPUnit/Samples/Money/MoneyBag.php";s:4:"1bef";s:50:"PHPUnit-3.2.16/PHPUnit/Samples/Money/MoneyTest.php";s:4:"0e43";s:48:"PHPUnit-3.2.16/PHPUnit/Runner/BaseTestRunner.php";s:4:"86b7";s:58:"PHPUnit-3.2.16/PHPUnit/Runner/IncludePathTestCollector.php";s:4:"5e87";s:57:"PHPUnit-3.2.16/PHPUnit/Runner/StandardTestSuiteLoader.php";s:4:"ff45";s:47:"PHPUnit-3.2.16/PHPUnit/Runner/TestCollector.php";s:4:"17aa";s:49:"PHPUnit-3.2.16/PHPUnit/Runner/TestSuiteLoader.php";s:4:"e2f8";s:41:"PHPUnit-3.2.16/PHPUnit/Runner/Version.php";s:4:"4681";s:37:"PHPUnit-3.2.16/PHPUnit/Util/Class.php";s:4:"3770";s:44:"PHPUnit-3.2.16/PHPUnit/Util/CodeCoverage.php";s:4:"fb65";s:45:"PHPUnit-3.2.16/PHPUnit/Util/Configuration.php";s:4:"966d";s:44:"PHPUnit-3.2.16/PHPUnit/Util/ErrorHandler.php";s:4:"90d9";s:42:"PHPUnit-3.2.16/PHPUnit/Util/Fileloader.php";s:4:"8751";s:42:"PHPUnit-3.2.16/PHPUnit/Util/Filesystem.php";s:4:"8903";s:38:"PHPUnit-3.2.16/PHPUnit/Util/Filter.php";s:4:"0c5f";s:46:"PHPUnit-3.2.16/PHPUnit/Util/FilterIterator.php";s:4:"9078";s:38:"PHPUnit-3.2.16/PHPUnit/Util/Getopt.php";s:4:"093a";s:39:"PHPUnit-3.2.16/PHPUnit/Util/Metrics.php";s:4:"f115";s:35:"PHPUnit-3.2.16/PHPUnit/Util/PDO.php";s:4:"e227";s:39:"PHPUnit-3.2.16/PHPUnit/Util/Printer.php";s:4:"995f";s:38:"PHPUnit-3.2.16/PHPUnit/Util/Report.php";s:4:"bf6b";s:40:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton.php";s:4:"03dc";s:40:"PHPUnit-3.2.16/PHPUnit/Util/Template.php";s:4:"2bc5";s:36:"PHPUnit-3.2.16/PHPUnit/Util/Test.php";s:4:"32d9";s:49:"PHPUnit-3.2.16/PHPUnit/Util/TestSuiteIterator.php";s:4:"4268";s:37:"PHPUnit-3.2.16/PHPUnit/Util/Timer.php";s:4:"02e8";s:36:"PHPUnit-3.2.16/PHPUnit/Util/Type.php";s:4:"abd3";s:35:"PHPUnit-3.2.16/PHPUnit/Util/XML.php";s:4:"b417";s:43:"PHPUnit-3.2.16/PHPUnit/Util/Report/Node.php";s:4:"cda8";s:53:"PHPUnit-3.2.16/PHPUnit/Util/Report/Node/Directory.php";s:4:"2466";s:48:"PHPUnit-3.2.16/PHPUnit/Util/Report/Node/File.php";s:4:"07a6";s:54:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/butter.png";s:4:"521e";s:57:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/chameleon.png";s:4:"24ab";s:57:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/close12_1.gif";s:4:"770d";s:60:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/container-min.js";s:4:"322d";s:57:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/container.css";s:4:"9f41";s:58:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/directory.html";s:4:"1f29";s:53:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/file.html";s:4:"75cd";s:60:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/file_no_yui.html";s:4:"0396";s:53:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/glass.png";s:4:"d0bc";s:53:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/item.html";s:4:"e9f0";s:60:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/method_item.html";s:4:"02b8";s:59:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/scarlet_red.png";s:4:"e7e9";s:52:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/snow.png";s:4:"3d0f";s:53:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/style.css";s:4:"8af7";s:62:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/yahoo-dom-event.js";s:4:"02f0";s:55:"PHPUnit-3.2.16/PHPUnit/Util/Report/Template/yui_item.js";s:4:"32c5";s:39:"PHPUnit-3.2.16/PHPUnit/Util/Log/CPD.php";s:4:"f10c";s:44:"PHPUnit-3.2.16/PHPUnit/Util/Log/Database.php";s:4:"e60d";s:44:"PHPUnit-3.2.16/PHPUnit/Util/Log/GraphViz.php";s:4:"5f85";s:40:"PHPUnit-3.2.16/PHPUnit/Util/Log/JSON.php";s:4:"1c50";s:43:"PHPUnit-3.2.16/PHPUnit/Util/Log/Metrics.php";s:4:"512c";s:40:"PHPUnit-3.2.16/PHPUnit/Util/Log/PEAR.php";s:4:"90bb";s:39:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD.php";s:4:"e4f2";s:39:"PHPUnit-3.2.16/PHPUnit/Util/Log/TAP.php";s:4:"b030";s:39:"PHPUnit-3.2.16/PHPUnit/Util/Log/XML.php";s:4:"5a35";s:50:"PHPUnit-3.2.16/PHPUnit/Util/Log/Database/MySQL.sql";s:4:"5dac";s:52:"PHPUnit-3.2.16/PHPUnit/Util/Log/Database/SQLite3.sql";s:4:"d9b0";s:44:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule.php";s:4:"0ba3";s:50:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Class.php";s:4:"cf16";s:49:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/File.php";s:4:"5471";s:53:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Function.php";s:4:"2d5e";s:52:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Project.php";s:4:"23f7";s:73:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Class/DepthOfInheritanceTree.php";s:4:"1d2d";s:67:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Class/EfferentCoupling.php";s:4:"36e4";s:71:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Class/ExcessiveClassLength.php";s:4:"0c93";s:71:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Class/ExcessivePublicCount.php";s:4:"de1b";s:64:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Class/TooManyFields.php";s:4:"fe4e";s:58:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Function/CRAP.php";s:4:"6d33";s:66:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Function/CodeCoverage.php";s:4:"85ad";s:74:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Function/CyclomaticComplexity.php";s:4:"a2c5";s:75:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Function/ExcessiveMethodLength.php";s:4:"3de2";s:76:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Function/ExcessiveParameterList.php";s:4:"f33b";s:69:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Function/NPathComplexity.php";s:4:"2dd6";s:57:"PHPUnit-3.2.16/PHPUnit/Util/Log/PMD/Rule/Project/CRAP.php";s:4:"db4d";s:57:"PHPUnit-3.2.16/PHPUnit/Util/Log/CodeCoverage/Database.php";s:4:"8ff3";s:52:"PHPUnit-3.2.16/PHPUnit/Util/Log/CodeCoverage/XML.php";s:4:"dc24";s:53:"PHPUnit-3.2.16/PHPUnit/Util/Log/CodeCoverage/json.php";s:4:"b3a7";s:61:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/IncompleteTestMethod.tpl";s:4:"f965";s:50:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/TestClass.tpl";s:4:"8a33";s:51:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/TestMethod.tpl";s:4:"6141";s:55:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/TestMethodBool.tpl";s:4:"9a09";s:61:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/TestMethodBoolStatic.tpl";s:4:"9fa0";s:60:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/TestMethodException.tpl";s:4:"c08f";s:66:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/TestMethodExceptionStatic.tpl";s:4:"c021";s:57:"PHPUnit-3.2.16/PHPUnit/Util/Skeleton/TestMethodStatic.tpl";s:4:"4b31";s:45:"PHPUnit-3.2.16/PHPUnit/Util/Metrics/Class.php";s:4:"b0c9";s:44:"PHPUnit-3.2.16/PHPUnit/Util/Metrics/File.php";s:4:"26b8";s:48:"PHPUnit-3.2.16/PHPUnit/Util/Metrics/Function.php";s:4:"fe84";s:47:"PHPUnit-3.2.16/PHPUnit/Util/Metrics/Project.php";s:4:"66a5";s:54:"PHPUnit-3.2.16/PHPUnit/Util/TestDox/NamePrettifier.php";s:4:"c344";s:53:"PHPUnit-3.2.16/PHPUnit/Util/TestDox/ResultPrinter.php";s:4:"70c5";s:58:"PHPUnit-3.2.16/PHPUnit/Util/TestDox/ResultPrinter/HTML.php";s:4:"033f";s:58:"PHPUnit-3.2.16/PHPUnit/Util/TestDox/ResultPrinter/Text.php";s:4:"37bf";s:43:"PHPUnit-3.2.16/PHPUnit/Framework/Assert.php";s:4:"f81b";s:57:"PHPUnit-3.2.16/PHPUnit/Framework/AssertionFailedError.php";s:4:"3b72";s:54:"PHPUnit-3.2.16/PHPUnit/Framework/ComparisonFailure.php";s:4:"3625";s:47:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint.php";s:4:"da78";s:42:"PHPUnit-3.2.16/PHPUnit/Framework/Error.php";s:4:"a8e3";s:63:"PHPUnit-3.2.16/PHPUnit/Framework/ExpectationFailedException.php";s:4:"7a73";s:51:"PHPUnit-3.2.16/PHPUnit/Framework/IncompleteTest.php";s:4:"76ae";s:56:"PHPUnit-3.2.16/PHPUnit/Framework/IncompleteTestError.php";s:4:"18a5";s:43:"PHPUnit-3.2.16/PHPUnit/Framework/Notice.php";s:4:"07a0";s:51:"PHPUnit-3.2.16/PHPUnit/Framework/SelfDescribing.php";s:4:"8dcc";s:48:"PHPUnit-3.2.16/PHPUnit/Framework/SkippedTest.php";s:4:"74a3";s:53:"PHPUnit-3.2.16/PHPUnit/Framework/SkippedTestError.php";s:4:"9fb5";s:58:"PHPUnit-3.2.16/PHPUnit/Framework/SkippedTestSuiteError.php";s:4:"707f";s:41:"PHPUnit-3.2.16/PHPUnit/Framework/Test.php";s:4:"98df";s:45:"PHPUnit-3.2.16/PHPUnit/Framework/TestCase.php";s:4:"ff4c";s:48:"PHPUnit-3.2.16/PHPUnit/Framework/TestFailure.php";s:4:"c4bb";s:49:"PHPUnit-3.2.16/PHPUnit/Framework/TestListener.php";s:4:"2a6e";s:47:"PHPUnit-3.2.16/PHPUnit/Framework/TestResult.php";s:4:"3eb7";s:46:"PHPUnit-3.2.16/PHPUnit/Framework/TestSuite.php";s:4:"4c6e";s:44:"PHPUnit-3.2.16/PHPUnit/Framework/Warning.php";s:4:"ecb0";s:60:"PHPUnit-3.2.16/PHPUnit/Framework/ComparisonFailure/Array.php";s:4:"97b3";s:61:"PHPUnit-3.2.16/PHPUnit/Framework/ComparisonFailure/Object.php";s:4:"1a32";s:61:"PHPUnit-3.2.16/PHPUnit/Framework/ComparisonFailure/Scalar.php";s:4:"9afc";s:61:"PHPUnit-3.2.16/PHPUnit/Framework/ComparisonFailure/String.php";s:4:"19e3";s:59:"PHPUnit-3.2.16/PHPUnit/Framework/ComparisonFailure/Type.php";s:4:"5a6a";s:58:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Invocation.php";s:4:"3a6d";s:64:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/InvocationMocker.php";s:4:"49c0";s:57:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Invokable.php";s:4:"df06";s:55:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher.php";s:4:"b5a2";s:52:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Mock.php";s:4:"d1ad";s:58:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/MockObject.php";s:4:"6286";s:52:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Stub.php";s:4:"1173";s:58:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Verifiable.php";s:4:"0e07";s:71:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/AnyInvokedCount.php";s:4:"522f";s:69:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/AnyParameters.php";s:4:"f7cc";s:66:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/Invocation.php";s:4:"abce";s:70:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/InvokedAtIndex.php";s:4:"172c";s:74:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/InvokedAtLeastOnce.php";s:4:"fdc9";s:68:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/InvokedCount.php";s:4:"2455";s:71:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/InvokedRecorder.php";s:4:"c0c1";s:66:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/MethodName.php";s:4:"b3ab";s:66:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/Parameters.php";s:4:"3216";s:75:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Matcher/StatelessInvocation.php";s:4:"a4bc";s:64:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Builder/Identity.php";s:4:"0d51";s:72:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Builder/InvocationMocker.php";s:4:"df3f";s:61:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Builder/Match.php";s:4:"aea0";s:71:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Builder/MethodNameMatch.php";s:4:"d52a";s:65:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Builder/Namespace.php";s:4:"be09";s:71:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Builder/ParametersMatch.php";s:4:"4ce4";s:60:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Builder/Stub.php";s:4:"ca87";s:69:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Stub/ConsecutiveCalls.php";s:4:"2331";s:62:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Stub/Exception.php";s:4:"2d8e";s:70:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Stub/MatcherCollection.php";s:4:"bdc3";s:59:"PHPUnit-3.2.16/PHPUnit/Framework/MockObject/Stub/Return.php";s:4:"6efb";s:51:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/And.php";s:4:"52a7";s:59:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/ArrayHasKey.php";s:4:"ab75";s:57:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/Attribute.php";s:4:"8e34";s:65:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/ClassHasAttribute.php";s:4:"a6c8";s:71:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/ClassHasStaticAttribute.php";s:4:"a71e";s:58:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/FileExists.php";s:4:"c505";s:59:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/GreaterThan.php";s:4:"7227";s:58:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/IsAnything.php";s:4:"d0e6";s:55:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/IsEqual.php";s:4:"2da7";s:59:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/IsIdentical.php";s:4:"db75";s:60:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/IsInstanceOf.php";s:4:"d666";s:54:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/IsType.php";s:4:"e2d7";s:56:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/LessThan.php";s:4:"198c";s:51:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/Not.php";s:4:"d5ea";s:66:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/ObjectHasAttribute.php";s:4:"5824";s:50:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/Or.php";s:4:"cc79";s:57:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/PCREMatch.php";s:4:"1e92";s:62:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/StringContains.php";s:4:"7c80";s:67:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/TraversableContains.php";s:4:"1937";s:71:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/TraversableContainsOnly.php";s:4:"17ef";s:51:"PHPUnit-3.2.16/PHPUnit/Framework/Constraint/Xor.php";s:4:"d3cd";s:55:"PHPUnit-3.2.16/PHPUnit/Extensions/ExceptionTestCase.php";s:4:"d44d";s:52:"PHPUnit-3.2.16/PHPUnit/Extensions/OutputTestCase.php";s:4:"7a59";s:57:"PHPUnit-3.2.16/PHPUnit/Extensions/PerformanceTestCase.php";s:4:"38d3";s:50:"PHPUnit-3.2.16/PHPUnit/Extensions/PhptTestCase.php";s:4:"9810";s:51:"PHPUnit-3.2.16/PHPUnit/Extensions/PhptTestSuite.php";s:4:"3b92";s:50:"PHPUnit-3.2.16/PHPUnit/Extensions/RepeatedTest.php";s:4:"cf48";s:54:"PHPUnit-3.2.16/PHPUnit/Extensions/SeleniumTestCase.php";s:4:"1be9";s:51:"PHPUnit-3.2.16/PHPUnit/Extensions/TestDecorator.php";s:4:"5b28";s:47:"PHPUnit-3.2.16/PHPUnit/Extensions/TestSetup.php";s:4:"2aa8";s:61:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/AbstractTester.php";s:4:"168d";s:60:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DefaultTester.php";s:4:"393b";s:54:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/ITester.php";s:4:"5f20";s:55:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/TestCase.php";s:4:"304f";s:66:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Composite.php";s:4:"0884";s:63:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Delete.php";s:4:"6a8d";s:66:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/DeleteAll.php";s:4:"1a92";s:66:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Exception.php";s:4:"7e2a";s:64:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Factory.php";s:4:"8529";s:75:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/IDatabaseOperation.php";s:4:"f6be";s:63:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Insert.php";s:4:"8387";s:61:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Null.php";s:4:"53d2";s:64:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Replace.php";s:4:"8adc";s:65:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/RowBased.php";s:4:"eb8e";s:65:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Truncate.php";s:4:"b111";s:63:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Operation/Update.php";s:4:"1e59";s:70:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/AbstractDataSet.php";s:4:"5dba";s:68:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/AbstractTable.php";s:4:"dfbe";s:76:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/AbstractTableMetaData.php";s:4:"9b97";s:73:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/AbstractXmlDataSet.php";s:4:"25b0";s:68:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/DataSetFilter.php";s:4:"f12b";s:69:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/DefaultDataSet.php";s:4:"eae9";s:67:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/DefaultTable.php";s:4:"ad7e";s:75:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/DefaultTableIterator.php";s:4:"4908";s:75:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/DefaultTableMetaData.php";s:4:"d401";s:69:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/FlatXmlDataSet.php";s:4:"9441";s:63:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/IDataSet.php";s:4:"ec09";s:61:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/ITable.php";s:4:"4d80";s:69:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/ITableIterator.php";s:4:"72ed";s:69:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/ITableMetaData.php";s:4:"4f71";s:66:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/TableFilter.php";s:4:"598f";s:74:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/TableMetaDataFilter.php";s:4:"3ff2";s:65:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DataSet/XmlDataSet.php";s:4:"4eec";s:57:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/DataSet.php";s:4:"ed2b";s:75:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/DefaultDatabaseConnection.php";s:4:"33d4";s:65:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/FilteredDataSet.php";s:4:"93ca";s:69:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/IDatabaseConnection.php";s:4:"7cd3";s:59:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/IMetaData.php";s:4:"ab84";s:58:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/MetaData.php";s:4:"d9bf";s:64:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/ResultSetTable.php";s:4:"85a8";s:55:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/Table.php";s:4:"5684";s:63:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/TableIterator.php";s:4:"46c4";s:63:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/TableMetaData.php";s:4:"41af";s:76:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/MetaData/InformationSchema.php";s:4:"14af";s:64:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/MetaData/MySQL.php";s:4:"5980";s:62:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/MetaData/Oci.php";s:4:"eeea";s:64:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/MetaData/PgSQL.php";s:4:"ade5";s:65:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/DB/MetaData/Sqlite.php";s:4:"96ac";s:72:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Constraint/DataSetIsEqual.php";s:4:"a611";s:70:"PHPUnit-3.2.16/PHPUnit/Extensions/Database/Constraint/TableIsEqual.php";s:4:"1c1f";s:57:"PHPUnit-3.2.16/PHPUnit/Extensions/PhptTestCase/Logger.php";s:4:"c95b";s:61:"PHPUnit-3.2.16/PHPUnit/Extensions/SeleniumTestCase/append.php";s:4:"7f04";s:71:"PHPUnit-3.2.16/PHPUnit/Extensions/SeleniumTestCase/phpunit_coverage.php";s:4:"3d38";s:62:"PHPUnit-3.2.16/PHPUnit/Extensions/SeleniumTestCase/prepend.php";s:4:"fb42";s:41:"PHPUnit-3.2.16/PHPUnit/TextUI/Command.php";s:4:"47b4";s:47:"PHPUnit-3.2.16/PHPUnit/TextUI/ResultPrinter.php";s:4:"957a";s:44:"PHPUnit-3.2.16/PHPUnit/TextUI/TestRunner.php";s:4:"363a";s:41:"PHPUnit-3.2.16/PHPUnit/Tests/AllTests.php";s:4:"4955";s:55:"PHPUnit-3.2.16/PHPUnit/Tests/TestConfiguration.php.dist";s:4:"54e9";s:48:"PHPUnit-3.2.16/PHPUnit/Tests/Runner/AllTests.php";s:4:"0313";s:58:"PHPUnit-3.2.16/PHPUnit/Tests/Runner/BaseTestRunnerTest.php";s:4:"6986";s:46:"PHPUnit-3.2.16/PHPUnit/Tests/Util/AllTests.php";s:4:"08e6";s:47:"PHPUnit-3.2.16/PHPUnit/Tests/Util/TimerTest.php";s:4:"ed30";s:54:"PHPUnit-3.2.16/PHPUnit/Tests/Util/TestDox/AllTests.php";s:4:"c471";s:64:"PHPUnit-3.2.16/PHPUnit/Tests/Util/TestDox/NamePrettifierTest.php";s:4:"cfa1";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/AllTests.php";s:4:"283c";s:53:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/AssertTest.php";s:4:"eb7a";s:64:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/ComparisonFailureTest.php";s:4:"a422";s:57:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/ConstraintTest.php";s:4:"13f2";s:57:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/MockObjectTest.php";s:4:"27c2";s:52:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/SuiteTest.php";s:4:"256c";s:55:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/TestCaseTest.php";s:4:"bf3c";s:62:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/TestImplementorTest.php";s:4:"7e45";s:59:"PHPUnit-3.2.16/PHPUnit/Tests/Framework/TestListenerTest.php";s:4:"d91e";s:52:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/AllTests.php";s:4:"8398";s:62:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/OutputTestCaseTest.php";s:4:"c104";s:67:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/PerformanceTestCaseTest.php";s:4:"b4e4";s:60:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/RepeatedTestTest.php";s:4:"32a8";s:64:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/SeleniumTestCaseTest.php";s:4:"19be";s:61:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/AllTests.php";s:4:"2e60";s:71:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/Operation/AllTests.php";s:4:"b064";s:77:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/Operation/OperationsTest.php";s:4:"989c";s:75:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/Operation/RowBasedTest.php";s:4:"1909";s:69:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/DataSet/AllTests.php";s:4:"3dcb";s:71:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/DataSet/FilterTest.php";s:4:"dd16";s:76:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/DataSet/XmlDataSetsTest.php";s:4:"ffa6";s:94:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/DeleteAllOperationTest.xml";s:4:"fb1c";s:93:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/DeleteOperationResult.xml";s:4:"d076";s:91:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/DeleteOperationTest.xml";s:4:"e1a9";s:94:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/FilteredTestComparison.xml";s:4:"1f27";s:91:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/FilteredTestFixture.xml";s:4:"184a";s:86:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/FlatXmlDataSet.xml";s:4:"2b8f";s:93:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/InsertOperationResult.xml";s:4:"8156";s:91:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/InsertOperationTest.xml";s:4:"89c5";s:93:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/OperationsTestFixture.xml";s:4:"1f27";s:94:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/ReplaceOperationResult.xml";s:4:"845c";s:92:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/ReplaceOperationTest.xml";s:4:"68cb";s:87:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/RowBasedExecute.xml";s:4:"1b80";s:93:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/UpdateOperationResult.xml";s:4:"4917";s:91:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/UpdateOperationTest.xml";s:4:"134a";s:82:"PHPUnit-3.2.16/PHPUnit/Tests/Extensions/Database/_files/XmlDataSets/XmlDataSet.xml";s:4:"c2d2";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/_files/AnInterface.php";s:4:"c3b0";s:52:"PHPUnit-3.2.16/PHPUnit/Tests/_files/BankAccount.json";s:4:"5d0b";s:55:"PHPUnit-3.2.16/PHPUnit/Tests/_files/BankAccount.metrics";s:4:"68b3";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/_files/BankAccount.pmd";s:4:"68b3";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/_files/BankAccount.tap";s:4:"0c52";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/_files/BankAccount.xml";s:4:"4bbc";s:68:"PHPUnit-3.2.16/PHPUnit/Tests/_files/ClassWithNonPublicAttributes.php";s:4:"7d88";s:54:"PHPUnit-3.2.16/PHPUnit/Tests/_files/DoubleTestCase.php";s:4:"8b6c";s:45:"PHPUnit-3.2.16/PHPUnit/Tests/_files/Error.php";s:4:"b4ef";s:47:"PHPUnit-3.2.16/PHPUnit/Tests/_files/Failure.php";s:4:"7e36";s:57:"PHPUnit-3.2.16/PHPUnit/Tests/_files/InheritedTestCase.php";s:4:"fef8";s:50:"PHPUnit-3.2.16/PHPUnit/Tests/_files/MockRunner.php";s:4:"b444";s:57:"PHPUnit-3.2.16/PHPUnit/Tests/_files/NoArgTestCaseTest.php";s:4:"d851";s:55:"PHPUnit-3.2.16/PHPUnit/Tests/_files/NoTestCaseClass.php";s:4:"7fdb";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/_files/NoTestCases.php";s:4:"9d16";s:49:"PHPUnit-3.2.16/PHPUnit/Tests/_files/NonStatic.php";s:4:"ca1f";s:57:"PHPUnit-3.2.16/PHPUnit/Tests/_files/NotPublicTestCase.php";s:4:"8531";s:55:"PHPUnit-3.2.16/PHPUnit/Tests/_files/NotVoidTestCase.php";s:4:"0ee8";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/_files/OneTestCase.php";s:4:"e209";s:54:"PHPUnit-3.2.16/PHPUnit/Tests/_files/OutputTestCase.php";s:4:"b008";s:56:"PHPUnit-3.2.16/PHPUnit/Tests/_files/OverrideTestCase.php";s:4:"e087";s:51:"PHPUnit-3.2.16/PHPUnit/Tests/_files/SampleClass.php";s:4:"9396";s:52:"PHPUnit-3.2.16/PHPUnit/Tests/_files/SetupFailure.php";s:4:"9240";s:45:"PHPUnit-3.2.16/PHPUnit/Tests/_files/Sleep.php";s:4:"e2bb";s:46:"PHPUnit-3.2.16/PHPUnit/Tests/_files/Struct.php";s:4:"b133";s:47:"PHPUnit-3.2.16/PHPUnit/Tests/_files/Success.php";s:4:"82d5";s:55:"PHPUnit-3.2.16/PHPUnit/Tests/_files/TearDownFailure.php";s:4:"8a6b";s:52:"PHPUnit-3.2.16/PHPUnit/Tests/_files/TestIterator.php";s:4:"bd85";s:62:"PHPUnit-3.2.16/PHPUnit/Tests/_files/ThrowExceptionTestCase.php";s:4:"88a7";s:64:"PHPUnit-3.2.16/PHPUnit/Tests/_files/ThrowNoExceptionTestCase.php";s:4:"8253";s:48:"PHPUnit-3.2.16/PHPUnit/Tests/_files/TornDown.php";s:4:"24c9";s:49:"PHPUnit-3.2.16/PHPUnit/Tests/_files/TornDown2.php";s:4:"feaf";s:49:"PHPUnit-3.2.16/PHPUnit/Tests/_files/TornDown3.php";s:4:"82a3";s:49:"PHPUnit-3.2.16/PHPUnit/Tests/_files/TornDown4.php";s:4:"6108";s:49:"PHPUnit-3.2.16/PHPUnit/Tests/_files/TornDown5.php";s:4:"cf8b";s:46:"PHPUnit-3.2.16/PHPUnit/Tests/_files/WasRun.php";s:4:"961f";s:43:"PHPUnit-3.2.16/PHPUnit/Tests/_files/bar.xml";s:4:"1581";s:43:"PHPUnit-3.2.16/PHPUnit/Tests/_files/foo.xml";s:4:"6dc4";s:27:"tests/database_testcase.php";s:4:"76cb";s:35:"tests/database_testcase_dataset.xml";s:4:"0651";s:34:"tests/tx_phpunit_test_testcase.php";s:4:"be47";s:33:"tests/tx_t3unit_test_testcase.php";s:4:"f604";s:23:"tests/res/ccc/ChangeLog";s:4:"6901";s:24:"tests/res/ccc/README.txt";s:4:"ee2d";s:28:"tests/res/ccc/ext_emconf.php";s:4:"1dc9";s:26:"tests/res/ccc/ext_icon.gif";s:4:"1bdc";s:28:"tests/res/ccc/ext_tables.php";s:4:"7b15";s:28:"tests/res/ccc/ext_tables.sql";s:4:"ed29";s:34:"tests/res/ccc/icon_tx_ccc_data.gif";s:4:"475a";s:34:"tests/res/ccc/icon_tx_ccc_test.gif";s:4:"475a";s:30:"tests/res/ccc/locallang_db.xml";s:4:"4f69";s:21:"tests/res/ccc/tca.php";s:4:"eb30";s:33:"tests/res/ccc/doc/wizard_form.dat";s:4:"5b6a";s:34:"tests/res/ccc/doc/wizard_form.html";s:4:"79f5";s:23:"tests/res/aaa/ChangeLog";s:4:"661e";s:24:"tests/res/aaa/README.txt";s:4:"ee2d";s:28:"tests/res/aaa/ext_emconf.php";s:4:"c526";s:26:"tests/res/aaa/ext_icon.gif";s:4:"1bdc";s:28:"tests/res/aaa/ext_tables.php";s:4:"6a79";s:28:"tests/res/aaa/ext_tables.sql";s:4:"1764";s:34:"tests/res/aaa/icon_tx_aaa_test.gif";s:4:"475a";s:30:"tests/res/aaa/locallang_db.xml";s:4:"9d47";s:21:"tests/res/aaa/tca.php";s:4:"ddf9";s:33:"tests/res/aaa/doc/wizard_form.dat";s:4:"1855";s:34:"tests/res/aaa/doc/wizard_form.html";s:4:"a38d";s:23:"tests/res/bbb/ChangeLog";s:4:"1da2";s:24:"tests/res/bbb/README.txt";s:4:"ee2d";s:28:"tests/res/bbb/ext_emconf.php";s:4:"00bd";s:26:"tests/res/bbb/ext_icon.gif";s:4:"1bdc";s:28:"tests/res/bbb/ext_tables.php";s:4:"84d0";s:28:"tests/res/bbb/ext_tables.sql";s:4:"717c";s:34:"tests/res/bbb/icon_tx_bbb_test.gif";s:4:"475a";s:30:"tests/res/bbb/locallang_db.xml";s:4:"7f20";s:21:"tests/res/bbb/tca.php";s:4:"f9d2";s:33:"tests/res/bbb/doc/wizard_form.dat";s:4:"12fb";s:34:"tests/res/bbb/doc/wizard_form.html";s:4:"37bf";s:23:"tests/res/ddd/ChangeLog";s:4:"661e";s:24:"tests/res/ddd/README.txt";s:4:"ee2d";s:28:"tests/res/ddd/ext_emconf.php";s:4:"e6a7";s:26:"tests/res/ddd/ext_icon.gif";s:4:"1bdc";s:28:"tests/res/ddd/ext_tables.php";s:4:"eed5";s:28:"tests/res/ddd/ext_tables.sql";s:4:"df94";s:34:"tests/res/ddd/icon_tx_ddd_test.gif";s:4:"475a";s:30:"tests/res/ddd/locallang_db.xml";s:4:"0b54";s:21:"tests/res/ddd/tca.php";s:4:"7e17";s:33:"tests/res/ddd/doc/wizard_form.dat";s:4:"4baa";s:34:"tests/res/ddd/doc/wizard_form.html";s:4:"7033";s:14:"mod1/clear.gif";s:4:"cc11";s:13:"mod1/conf.php";s:4:"d394";s:14:"mod1/index.php";s:4:"b6c9";s:18:"mod1/locallang.xml";s:4:"bca5";s:22:"mod1/locallang_mod.php";s:4:"4d5c";s:19:"mod1/moduleicon.gif";s:4:"9d0b";s:19:"mod1/phpunit-be.css";s:4:"7ed4";s:16:"mod1/phpunit.gif";s:4:"ea4a";}',
	'suggests' => array(
	),
);

?>