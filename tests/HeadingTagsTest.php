<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\h1;
use k1lib\html\h2;
use k1lib\html\h3;
use k1lib\html\h4;
use k1lib\html\h5;
use k1lib\html\h6;

class HeadingTagsTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testH1Creation(): void
    {
        $h1 = new h1('Main Title');
        $this->assertInstanceOf(h1::class, $h1);
        $this->assertEquals('h1', $h1->get_tag_name());
    }

    public function testH1Generate(): void
    {
        $h1 = new h1('Main Title');
        $this->assertStringContainsString('Main Title', $h1->generate());
    }

    public function testH1WithClassAndId(): void
    {
        $h1 = new h1('Title', 'heading-class', 'main-heading');
        $this->assertEquals('heading-class', $h1->get_attribute('class'));
        $this->assertEquals('main-heading', $h1->get_attribute('id'));
    }

    public function testH2Creation(): void
    {
        $h2 = new h2('Sub Title');
        $this->assertInstanceOf(h2::class, $h2);
        $this->assertEquals('h2', $h2->get_tag_name());
    }

    public function testH3Creation(): void
    {
        $h3 = new h3('Section');
        $this->assertInstanceOf(h3::class, $h3);
        $this->assertEquals('h3', $h3->get_tag_name());
    }

    public function testH4Creation(): void
    {
        $h4 = new h4('Subsection');
        $this->assertInstanceOf(h4::class, $h4);
        $this->assertEquals('h4', $h4->get_tag_name());
    }

    public function testH5Creation(): void
    {
        $h5 = new h5('Minor');
        $this->assertInstanceOf(h5::class, $h5);
        $this->assertEquals('h5', $h5->get_tag_name());
    }

    public function testH6Creation(): void
    {
        $h6 = new h6('Smallest');
        $this->assertInstanceOf(h6::class, $h6);
        $this->assertEquals('h6', $h6->get_tag_name());
    }

    public function testAllHeadingsWithValue(): void
    {
        $headings = [
            new h1('H1'),
            new h2('H2'),
            new h3('H3'),
            new h4('H4'),
            new h5('H5'),
            new h6('H6'),
        ];
        foreach ($headings as $heading) {
            $this->assertStringContainsString($heading->get_value(), $heading->generate());
        }
    }
}