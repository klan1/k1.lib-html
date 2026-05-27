<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\br;
use k1lib\html\div;

class BrTest extends TestCase
{
    public function testBrCreation(): void
    {
        $br = new br();
        $this->assertInstanceOf(br::class, $br);
    }

    public function testBrTagName(): void
    {
        $br = new br();
        $this->assertEquals('br', $br->get_tag_name());
    }

    public function testBrGenerate(): void
    {
        $br = new br();
        $generated = $br->generate();
        $this->assertEquals('<br>', $generated);
    }

    public function testBrAppendToDiv(): void
    {
        $div = new div();
        $br = new br();
        $div->append_child($br);
        $this->assertTrue($div->has_childs());
    }
}