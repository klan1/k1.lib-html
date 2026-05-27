<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\img;
use k1lib\html\iframe;
use k1lib\html\hr;
use k1lib\html\meta;
use k1lib\html\link;
use k1lib\html\script;
use k1lib\html\style;
use k1lib\html\title;
use k1lib\html\pre;

class SelfClosedTagsTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testImgCreation(): void
    {
        $img = new img('photo.jpg');
        $this->assertInstanceOf(img::class, $img);
        $this->assertEquals('img', $img->get_tag_name());
    }

    public function testImgSrcAttribute(): void
    {
        $img = new img('image.png');
        $this->assertEquals('image.png', $img->get_attribute('src'));
    }

    public function testImgWithAlt(): void
    {
        $img = new img('photo.jpg', 'A nice photo');
        $this->assertEquals('A nice photo', $img->get_attribute('alt'));
    }

    public function testImgGenerate(): void
    {
        $img = new img('photo.jpg');
        $generated = $img->generate();
        $this->assertStringContainsString('<img', $generated);
        $this->assertStringContainsString('src="photo.jpg"', $generated);
    }

    public function testIframeCreation(): void
    {
        $iframe = new iframe('https://example.com');
        $this->assertInstanceOf(iframe::class, $iframe);
        $this->assertEquals('iframe', $iframe->get_tag_name());
    }

    public function testIframeSrcAttribute(): void
    {
        $iframe = new iframe('https://youtube.com/embed/video');
        $this->assertEquals('https://youtube.com/embed/video', $iframe->get_attribute('src'));
    }

    public function testIframeGenerate(): void
    {
        $iframe = new iframe('page.html');
        $this->assertStringContainsString('<iframe', $iframe->generate());
        $this->assertStringContainsString('src="page.html"', $iframe->generate());
    }

    public function testHrCreation(): void
    {
        $hr = new hr();
        $this->assertInstanceOf(hr::class, $hr);
        $this->assertEquals('hr', $hr->get_tag_name());
    }

    public function testHrGenerate(): void
    {
        $hr = new hr();
        $this->assertEquals('<hr>', $hr->generate());
    }

    public function testMetaCreation(): void
    {
        $meta = new meta('viewport', 'width=device-width');
        $this->assertInstanceOf(meta::class, $meta);
        $this->assertEquals('meta', $meta->get_tag_name());
    }

    public function testMetaAttributes(): void
    {
        $meta = new meta('description', 'A great website');
        $this->assertEquals('description', $meta->get_attribute('name'));
        $this->assertEquals('A great website', $meta->get_attribute('content'));
    }

    public function testLinkCreation(): void
    {
        $link = new link('stylesheet', 'style.css');
        $this->assertInstanceOf(link::class, $link);
        $this->assertEquals('link', $link->get_tag_name());
    }

    public function testLinkRelAndHref(): void
    {
        $link = new link('favicon.ico', 'icon');
        $this->assertEquals('icon', $link->get_attribute('rel'));
        $this->assertEquals('favicon.ico', $link->get_attribute('href'));
    }

    public function testScriptCreation(): void
    {
        $script = new script('text/javascript', 'app.js');
        $this->assertInstanceOf(script::class, $script);
        $this->assertEquals('script', $script->get_tag_name());
    }

    public function testScriptSrcAttribute(): void
    {
        $script = new script('jquery.min.js');
        $this->assertEquals('jquery.min.js', $script->get_attribute('src'));
    }

    public function testStyleCreation(): void
    {
        $style = new style();
        $this->assertInstanceOf(style::class, $style);
        $this->assertEquals('style', $style->get_tag_name());
    }

    public function testStyleWithContent(): void
    {
        $style = new style();
        $style->set_value('body { margin: 0; }');
        $this->assertStringContainsString('body { margin: 0; }', $style->generate());
    }

    public function testPreCreation(): void
    {
        $pre = new pre('code here');
        $this->assertInstanceOf(pre::class, $pre);
        $this->assertEquals('pre', $pre->get_tag_name());
    }

    public function testPreWithCode(): void
    {
        $pre = new pre('function test() { return true; }');
        $this->assertStringContainsString('function test() { return true; }', $pre->generate());
    }

    public function testTitleCreation(): void
    {
        $title = new title('Page Title');
        $this->assertInstanceOf(title::class, $title);
        $this->assertEquals('title', $title->get_tag_name());
    }

    public function testTitleValue(): void
    {
        $title = new title();
        $title->set_value('My Website');
        $this->assertStringContainsString('My Website', $title->generate());
    }
}