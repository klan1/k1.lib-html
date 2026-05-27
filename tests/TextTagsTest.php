<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\a;
use k1lib\html\p;
use k1lib\html\span;
use k1lib\html\em;
use k1lib\html\strong;
use k1lib\html\i;
use k1lib\html\b;
use k1lib\html\u;
use k1lib\html\code;
use k1lib\html\small;

class TextTagsTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testACreation(): void
    {
        $a = new a('https://example.com', 'Click here');
        $this->assertInstanceOf(a::class, $a);
        $this->assertEquals('a', $a->get_tag_name());
    }

    public function testAHrefAttribute(): void
    {
        $a = new a('https://example.com', 'Link');
        $this->assertEquals('https://example.com', $a->get_attribute('href'));
    }

    public function testAGenerate(): void
    {
        $a = new a('https://example.com', 'Visit Site');
        $generated = $a->generate();
        $this->assertStringContainsString('<a', $generated);
        $this->assertStringContainsString('href="https://example.com"', $generated);
        $this->assertStringContainsString('Visit Site', $generated);
    }

    public function testPCreation(): void
    {
        $p = new p('Paragraph text');
        $this->assertInstanceOf(p::class, $p);
        $this->assertEquals('p', $p->get_tag_name());
    }

    public function testPGenerate(): void
    {
        $p = new p('Some text content');
        $this->assertStringContainsString('Some text content', $p->generate());
    }

    public function testSpanCreation(): void
    {
        $span = new span();
        $this->assertInstanceOf(span::class, $span);
        $this->assertEquals('span', $span->get_tag_name());
    }

    public function testSpanWithValue(): void
    {
        $span = new span();
        $span->set_value('Inline text');
        $this->assertStringContainsString('Inline text', $span->generate());
    }

    public function testEmCreation(): void
    {
        $em = new em('Emphasis');
        $this->assertInstanceOf(em::class, $em);
        $this->assertEquals('em', $em->get_tag_name());
    }

    public function testStrongCreation(): void
    {
        $strong = new strong('Strong text');
        $this->assertInstanceOf(strong::class, $strong);
        $this->assertEquals('strong', $strong->get_tag_name());
    }

    public function testICreation(): void
    {
        $i = new i('Italic');
        $this->assertInstanceOf(i::class, $i);
        $this->assertEquals('i', $i->get_tag_name());
    }

    public function testBCreation(): void
    {
        $b = new b('Bold');
        $this->assertInstanceOf(b::class, $b);
        $this->assertEquals('b', $b->get_tag_name());
    }

    public function testCodeCreation(): void
    {
        $code = new code('echo "Hello"');
        $this->assertInstanceOf(code::class, $code);
        $this->assertEquals('code', $code->get_tag_name());
    }

    public function testCodeValue(): void
    {
        $code = new code('print_r($arr)');
        $this->assertStringContainsString('print_r($arr)', $code->generate());
    }

    public function testSmallCreation(): void
    {
        $small = new small('Small text');
        $this->assertInstanceOf(small::class, $small);
        $this->assertEquals('small', $small->get_tag_name());
    }
}