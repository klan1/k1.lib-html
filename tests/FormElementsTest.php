<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\input;
use k1lib\html\label;
use k1lib\html\form;
use k1lib\html\button;

class FormElementsTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
        \k1lib\html\tag::$root = null;
    }

    public function testInputCreation(): void
    {
        $input = new input('text', 'username', '');
        $this->assertInstanceOf(input::class, $input);
    }

    public function testInputTypeAttribute(): void
    {
        $input = new input('text', 'email', '');
        $this->assertEquals('text', $input->get_attribute('type'));
    }

    public function testInputNameAttribute(): void
    {
        $input = new input('text', 'username', '');
        $this->assertEquals('username', $input->get_attribute('name'));
    }

    public function testInputGenerate(): void
    {
        $input = new input('text', 'email', 'test@example.com');
        $generated = $input->generate();
        $this->assertStringContainsString('<input', $generated);
        $this->assertStringContainsString('type="text"', $generated);
        $this->assertStringContainsString('name="email"', $generated);
    }

    public function testLabelCreation(): void
    {
        $label = new label('Username', 'username-input');
        $this->assertInstanceOf(label::class, $label);
    }

    public function testLabelForAttribute(): void
    {
        $label = new label('Email', 'email-input');
        $this->assertEquals('email-input', $label->get_attribute('for'));
    }

    public function testLabelGenerate(): void
    {
        $label = new label('Email Address', 'email-input');
        $generated = $label->generate();
        $this->assertStringContainsString('<label', $generated);
        $this->assertStringContainsString('Email Address', $generated);
    }

    public function testFormCreation(): void
    {
        $form = new form();
        $this->assertInstanceOf(form::class, $form);
    }

    public function testFormMethodAttribute(): void
    {
        $form = new form();
        $form->set_attrib('method', 'POST');
        $this->assertEquals('POST', $form->get_attribute('method'));
    }

    public function testFormActionAttribute(): void
    {
        $form = new form();
        $form->set_attrib('action', '/submit');
        $this->assertEquals('/submit', $form->get_attribute('action'));
    }

    public function testFormWithChilds(): void
    {
        $form = new form();
        $input = new input('text', 'name', '');
        $form->append_child($input);
        $this->assertTrue($form->has_children());
    }

    public function testButtonCreation(): void
    {
        $button = new button();
        $this->assertInstanceOf(button::class, $button);
    }

    public function testButtonTypeAttribute(): void
    {
        $button = new button();
        $button->set_attrib('type', 'submit');
        $this->assertEquals('submit', $button->get_attribute('type'));
    }

    public function testButtonWithValue(): void
    {
        $button = new button();
        $button->set_value('Submit Form');
        $this->assertStringContainsString('Submit Form', $button->generate());
    }
}