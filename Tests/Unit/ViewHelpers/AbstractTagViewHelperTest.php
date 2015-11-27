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
 * Test case for Tx_Phpunit_ViewHelpers_AbstractTagViewHelper.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Felix Rauch <rauch@skaiamail.de>
 */
class Tx_Phpunit_Tests_Unit_ViewHelpers_AbstractTagViewHelperTest extends Tx_Phpunit_TestCase
{
    /**
     * @var Tx_Phpunit_Tests_Unit_ViewHelpers_Fixtures_TestingTagViewHelper
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new Tx_Phpunit_Tests_Unit_ViewHelpers_Fixtures_TestingTagViewHelper();
    }

    /**
     * @test
     */
    public function classIsSubclassOfAbstractViewHelper()
    {
        self::assertInstanceOf(
            'Tx_Phpunit_ViewHelpers_AbstractViewHelper',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function fixtureClassUsedForTestingIsASubclassOfAbstractTagViewHelper()
    {
        self::assertInstanceOf(
            'Tx_Phpunit_ViewHelpers_AbstractTagViewHelper',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function renderTagWithoutContentCreatesSelfClosingTag()
    {
        self::assertEquals(
            '<tag />',
            $this->subject->renderTag('tag', array(), '')
        );
    }

    /**
     * @test
     */
    public function renderTagWithContentCreatesTagWithContent()
    {
        self::assertEquals(
            '<tag>Test</tag>',
            $this->subject->renderTag('tag', array(), 'Test')
        );
    }

    /**
     * @test
     */
    public function renderTagWithAttributesCreatesTagWithAttributes()
    {
        $attributes = array(
            'value' => 'test',
            'empty' => ''
        );

        self::assertEquals(
            '<tag value="test" empty="" />',
            $this->subject->renderTag('tag', $attributes, '')
        );
    }

    /**
     * @test
     */
    public function renderTagWithAttributesAndContentCreatesTagWithAttributesAndContent()
    {
        $attributes = array(
            'value' => 'test',
            'empty' => ''
        );

        self::assertEquals(
            '<tag value="test" empty="">Test</tag>',
            $this->subject->renderTag('tag', $attributes, 'Test')
        );
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function callingRenderTagWithAnEmptyTagNameCausesAnInvalidArgumentException()
    {
        $this->subject->renderTag('', array(), '');
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function callingRenderTagWithAnAttributeWithANonStringKeyCausesAnInvalidArgumentException()
    {
        $attributes = array(
            'thisIsAValidKey' => 'value',
            4711 => 'value' // This is an invalid key
        );

        $this->subject->renderTag('tag', $attributes, '');
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function callingRenderTagWithAnAttributeWithAnEmptyStringAsKeyCausesAnInvalidArgumentException()
    {
        $attributes = array(
            'thisIsAValidKey' => 'value',
            '' => 'value' // This is an invalid key
        );

        $this->subject->renderTag('tag', $attributes, '');
    }
}