<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\ul;
use k1lib\html\ol;
use k1lib\html\li;

class ListTagsTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testUlCreation(): void
    {
        $ul = new ul();
        $this->assertInstanceOf(ul::class, $ul);
        $this->assertEquals('ul', $ul->get_tag_name());
    }

    public function testUlWithClassAndId(): void
    {
        $ul = new ul('nav-list', 'main-nav');
        $this->assertEquals('nav-list', $ul->get_attribute('class'));
        $this->assertEquals('main-nav', $ul->get_attribute('id'));
    }

    public function testUlAppendLi(): void
    {
        $ul = new ul();
        $li = $ul->append_li('Item 1');
        $this->assertInstanceOf(li::class, $li);
        $this->assertTrue($ul->has_children());
    }

    public function testUlMultipleLi(): void
    {
        $ul = new ul();
        $ul->append_li('First');
        $ul->append_li('Second');
        $ul->append_li('Third');
        $this->assertCount(3, $ul->get_childs());
    }

    public function testOlCreation(): void
    {
        $ol = new ol();
        $this->assertInstanceOf(ol::class, $ol);
        $this->assertEquals('ol', $ol->get_tag_name());
    }

    public function testOlWithClassAndId(): void
    {
        $ol = new ol('ordered-list', 'steps');
        $this->assertEquals('ordered-list', $ol->get_attribute('class'));
        $this->assertEquals('steps', $ol->get_attribute('id'));
    }

    public function testLiCreation(): void
    {
        $li = new li('List item');
        $this->assertInstanceOf(li::class, $li);
        $this->assertEquals('li', $li->get_tag_name());
    }

    public function testLiValue(): void
    {
        $li = new li('Item content');
        $this->assertStringContainsString('Item content', $li->generate());
    }

    public function testLiWithClassAndId(): void
    {
        $li = new li('Item', 'list-item', 'item-1');
        $this->assertEquals('list-item', $li->get_attribute('class'));
        $this->assertEquals('item-1', $li->get_attribute('id'));
    }
}