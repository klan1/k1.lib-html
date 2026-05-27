<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\div;
use k1lib\html\span;

class TagTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testTagCreation(): void
    {
        $tag = new tag('div', false);
        $this->assertInstanceOf(tag::class, $tag);
    }

    public function testGetTagName(): void
    {
        $tag = new tag('div', false);
        $this->assertEquals('div', $tag->get_tag_name());
    }

    public function testSetAndGetValue(): void
    {
        $tag = new tag('div', false);
        $tag->set_value('Hello World');
        $this->assertEquals('Hello World', $tag->get_value());
    }

    public function testSetAndGetAttribute(): void
    {
        $tag = new tag('div', false);
        $tag->set_attrib('class', 'my-class');
        $this->assertEquals('my-class', $tag->get_attribute('class'));
    }

    public function testSetId(): void
    {
        $tag = new tag('div', false);
        $tag->set_id('my-id');
        $this->assertEquals('my-id', $tag->get_attribute('id'));
    }

    public function testSetClass(): void
    {
        $tag = new tag('div', false);
        $tag->set_class('class1');
        $tag->set_class('class2', true);
        $this->assertEquals('class1 class2', $tag->get_attribute('class'));
    }

    public function testAppendChild(): void
    {
        $parent = new div();
        $child = new span();
        $parent->append_child($child);
        $this->assertTrue($parent->has_children());
    }

    public function testGenerateSelfClosedTag(): void
    {
        $tag = new tag('br', true);
        $this->assertEquals('<br>', $tag->generate());
    }

    public function testGenerateNonSelfClosedTag(): void
    {
        $tag = new tag('div', false);
        $tag->set_value('content');
        $this->assertEquals("<div>content</div>", trim($tag->generate()));
    }

    public function testGetElementById(): void
    {
        $div = new div();
        $div->set_id('test-id');
        $found = $div->get_element_by_id('test-id');
        $this->assertSame($div, $found);
    }

    public function testGetElementByIdInChild(): void
    {
        $parent = new div();
        $child = new div();
        $child->set_id('child-id');
        $parent->append_child($child);
        $found = $parent->get_element_by_id('child-id');
        $this->assertSame($child, $found);
    }

    public function testGetChilds(): void
    {
        $parent = new div();
        $child1 = new span();
        $child2 = new span();
        $parent->append_child($child1);
        $parent->append_child($child2);
        $childs = $parent->get_childs();
        $this->assertCount(2, $childs);
    }

    public function testRemoveChilds(): void
    {
        $parent = new div();
        $child = new span();
        $parent->append_child($child);
        $parent->remove_childs();
        $this->assertFalse($parent->has_children());
    }

    public function testPreCodeAndPostCode(): void
    {
        $tag = new tag('div', false);
        $tag->pre_code('<!-- comment -->');
        $tag->post_code('<!-- end comment -->');
        $generated = $tag->generate();
        $this->assertStringContainsString('<!-- comment -->', $generated);
        $this->assertStringContainsString('<!-- end comment -->', $generated);
    }

    public function testReplaceChild(): void
    {
        $parent = new div();
        $oldChild = new span();
        $oldChild->set_id('old');
        $parent->append_child($oldChild);

        $newChild = new span();
        $newChild->set_id('new');
        $parent->replace_child(0, $newChild);

        $found = $parent->get_element_by_id('new');
        $this->assertSame($newChild, $found);
    }
}