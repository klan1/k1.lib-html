<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\html_document;
use k1lib\html\title;
use k1lib\html\body;
use k1lib\html\head;

class HtmlDocumentTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testCreation(): void
    {
        $doc = new html_document();
        $this->assertInstanceOf(html_document::class, $doc);
    }

    public function testGetBody(): void
    {
        $doc = new html_document();
        $body = $doc->body();
        $this->assertInstanceOf(body::class, $body);
    }

    public function testGetHead(): void
    {
        $doc = new html_document();
        $head = $doc->head();
        $this->assertInstanceOf(head::class, $head);
    }

    public function testGenerate(): void
    {
        $doc = new html_document();
        $generated = $doc->generate();
        $this->assertStringContainsString('<!DOCTYPE html>', $generated);
    }

    public function testSetLang(): void
    {
        $doc = new html_document('es');
        $this->assertEquals('es', $doc->get_lang());
    }

    public function testGenerateWithLang(): void
    {
        $doc = new html_document('en');
        $generated = $doc->generate();
        $this->assertStringContainsString('lang="en"', $generated);
    }

    public function testSetCharset(): void
    {
        $doc = new html_document();
        $doc->set_charset('utf-8');
        $generated = $doc->generate();
        $this->assertStringContainsString('charset="utf-8"', $generated);
    }

    public function testSetViewport(): void
    {
        $doc = new html_document();
        $doc->set_viewport();
        $generated = $doc->generate();
        $this->assertStringContainsString('viewport', $generated);
    }
}