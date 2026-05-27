<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\div;
use k1lib\html\span;
use k1lib\html\p;
use k1lib\html\br;
use k1lib\html\h1;
use k1lib\html\a;

class DivTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
        \k1lib\html\tag::$root = null;
    }

    public function testDivCreation(): void
    {
        $div = new div();
        $this->assertInstanceOf(div::class, $div);
    }

    public function testDivTagName(): void
    {
        $div = new div();
        $this->assertEquals('div', $div->get_tag_name());
    }

    public function testDivGenerate(): void
    {
        $div = new div();
        $generated = $div->generate();
        $this->assertEquals("<div></div>", trim($generated));
    }

    public function testDivWithContent(): void
    {
        $div = new div();
        $div->set_value('Hello World');
        $this->assertStringContainsString('Hello World', $div->generate());
    }

    public function testDivWithChilds(): void
    {
        $div = new div();
        $child = new p();
        $child->set_value('Paragraph');
        $div->append_child($child);
        $this->assertTrue($div->has_children());
    }

    public function testDivWithMultipleChilds(): void
    {
        $div = new div();
        $div->append_child(new p());
        $div->append_child(new p());
        $this->assertCount(2, $div->get_childs());
    }

    public function testDivWithId(): void
    {
        $div = new div();
        $div->set_id('my-div');
        $this->assertStringContainsString('id="my-div"', $div->generate());
    }

    public function testDivWithClass(): void
    {
        $div = new div();
        $div->set_class('container wrapper');
        $this->assertStringContainsString('class="container wrapper"', $div->generate());
    }

    public function testDivWithStyle(): void
    {
        $div = new div();
        $div->set_style('color: red;');
        $this->assertStringContainsString('style="color: red;"', $div->generate());
    }
}