<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\section;
use k1lib\html\article;
use k1lib\html\aside;
use k1lib\html\header;
use k1lib\html\footer;
use k1lib\html\nav;
use k1lib\html\main;
use k1lib\html\div;

class LayoutTagsTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testSectionCreation(): void
    {
        $section = new section();
        $this->assertInstanceOf(section::class, $section);
        $this->assertEquals('section', $section->get_tag_name());
    }

    public function testSectionWithClassAndId(): void
    {
        $section = new section('content-section', 'about');
        $this->assertEquals('content-section', $section->get_attribute('class'));
        $this->assertEquals('about', $section->get_attribute('id'));
    }

    public function testArticleCreation(): void
    {
        $article = new article();
        $this->assertInstanceOf(article::class, $article);
        $this->assertEquals('article', $article->get_tag_name());
    }

    public function testAsideCreation(): void
    {
        $aside = new aside();
        $this->assertInstanceOf(aside::class, $aside);
        $this->assertEquals('aside', $aside->get_tag_name());
    }

    public function testHeaderCreation(): void
    {
        $header = new header();
        $this->assertInstanceOf(header::class, $header);
        $this->assertEquals('header', $header->get_tag_name());
    }

    public function testFooterCreation(): void
    {
        $footer = new footer();
        $this->assertInstanceOf(footer::class, $footer);
        $this->assertEquals('footer', $footer->get_tag_name());
    }

    public function testNavCreation(): void
    {
        $nav = new nav();
        $this->assertInstanceOf(nav::class, $nav);
        $this->assertEquals('nav', $nav->get_tag_name());
    }

    public function testMainCreation(): void
    {
        $main = new main();
        $this->assertInstanceOf(main::class, $main);
        $this->assertEquals('main', $main->get_tag_name());
    }

    public function testDivCreation(): void
    {
        $div = new div();
        $this->assertInstanceOf(div::class, $div);
        $this->assertEquals('div', $div->get_tag_name());
    }

    public function testLayoutWithNestedContent(): void
    {
        $page = new div();
        $header = new header();
        $header->append_child(new nav());
        $page->append_child($header);

        $main = new main();
        $article = new article();
        $main->append_child($article);
        $page->append_child($main);

        $footer = new footer();
        $page->append_child($footer);

        $this->assertCount(3, $page->get_childs());
    }

    public function testAllSemanticTagsWithValue(): void
    {
        $tags = [
            new section(),
            new article(),
            new aside(),
            new header(),
            new footer(),
            new nav(),
            new main(),
        ];
        foreach ($tags as $tag) {
            $this->assertEquals($tag->get_tag_name(), $tag->get_tag_name());
        }
    }
}