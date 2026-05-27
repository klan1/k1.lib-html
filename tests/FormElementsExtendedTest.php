<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\select;
use k1lib\html\option;
use k1lib\html\textarea;
use k1lib\html\fieldset;
use k1lib\html\legend;

class FormElementsExtendedTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testSelectCreation(): void
    {
        $select = new select('country');
        $this->assertInstanceOf(select::class, $select);
        $this->assertEquals('select', $select->get_tag_name());
    }

    public function testSelectNameAttribute(): void
    {
        $select = new select('country');
        $this->assertEquals('country', $select->get_attribute('name'));
    }

    public function testSelectWithClassAndId(): void
    {
        $select = new select('country', 'form-control', 'country-select');
        $this->assertEquals('form-control', $select->get_attribute('class'));
        $this->assertEquals('country-select', $select->get_attribute('id'));
    }

    public function testSelectAppendOption(): void
    {
        $select = new select('country');
        $option = $select->append_option('us', 'United States');
        $this->assertInstanceOf(option::class, $option);
        $this->assertTrue($select->has_childs());
    }

    public function testSelectMultipleOptions(): void
    {
        $select = new select('colors');
        $select->append_option('red', 'Red');
        $select->append_option('green', 'Green');
        $select->append_option('blue', 'Blue');
        $this->assertCount(3, $select->get_childs());
    }

    public function testSelectSetValue(): void
    {
        $select = new select('colors');
        $select->append_option('red', 'Red');
        $select->append_option('green', 'Green', true);
        $select->set_value('green');
        $generated = $select->generate();
        $this->assertStringContainsString('value="green"', $generated);
    }

    public function testTextareaCreation(): void
    {
        $textarea = new textarea('comments');
        $this->assertInstanceOf(textarea::class, $textarea);
        $this->assertEquals('textarea', $textarea->get_tag_name());
    }

    public function testTextareaNameAttribute(): void
    {
        $textarea = new textarea('comments');
        $this->assertEquals('comments', $textarea->get_attribute('name'));
    }

    public function testTextareaRowsAttribute(): void
    {
        $textarea = new textarea('comments');
        $this->assertEquals('10', $textarea->get_attribute('rows'));
    }

    public function testTextareaGenerate(): void
    {
        $textarea = new textarea('description');
        $generated = $textarea->generate();
        $this->assertStringContainsString('<textarea', $generated);
        $this->assertStringContainsString('name="description"', $generated);
    }

    public function testTextareaWithValue(): void
    {
        $textarea = new textarea('bio');
        $textarea->set_value('Some bio text here');
        $this->assertStringContainsString('Some bio text here', $textarea->generate());
    }

    public function testFieldsetCreation(): void
    {
        $fieldset = new fieldset('Personal Info');
        $this->assertInstanceOf(fieldset::class, $fieldset);
        $this->assertEquals('fieldset', $fieldset->get_tag_name());
    }

    public function testFieldsetWithChilds(): void
    {
        $fieldset = new fieldset('Address');
        $this->assertTrue($fieldset->has_childs());
    }

    public function testLegendCreation(): void
    {
        $legend = new legend('Address');
        $this->assertInstanceOf(legend::class, $legend);
        $this->assertEquals('legend', $legend->get_tag_name());
    }

    public function testLegendValue(): void
    {
        $legend = new legend('Contact Details');
        $this->assertStringContainsString('Contact Details', $legend->generate());
    }
}