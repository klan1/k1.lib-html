<?php

namespace k1lib\html\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\tag;
use k1lib\html\table;
use k1lib\html\thead;
use k1lib\html\tbody;
use k1lib\html\tfoot;
use k1lib\html\tr;
use k1lib\html\th;
use k1lib\html\td;
use k1lib\html\caption;

class TableTagsTest extends TestCase
{
    protected function setUp(): void
    {
        tag::set_use_log(false);
        tag::$root = null;
    }

    public function testTableCreation(): void
    {
        $table = new table();
        $this->assertInstanceOf(table::class, $table);
        $this->assertEquals('table', $table->get_tag_name());
    }

    public function testTableWithClassAndId(): void
    {
        $table = new table('data-table', 'users-table');
        $this->assertEquals('data-table', $table->get_attribute('class'));
        $this->assertEquals('users-table', $table->get_attribute('id'));
    }

    public function testTableAppendThead(): void
    {
        $table = new table();
        $thead = $table->append_thead();
        $this->assertInstanceOf(thead::class, $thead);
        $this->assertTrue($table->has_children());
    }

    public function testTableAppendTbody(): void
    {
        $table = new table();
        $tbody = $table->append_tbody();
        $this->assertInstanceOf(tbody::class, $tbody);
    }

    public function testTheadCreation(): void
    {
        $thead = new thead();
        $this->assertInstanceOf(thead::class, $thead);
        $this->assertEquals('thead', $thead->get_tag_name());
    }

    public function testTbodyCreation(): void
    {
        $tbody = new tbody();
        $this->assertInstanceOf(tbody::class, $tbody);
        $this->assertEquals('tbody', $tbody->get_tag_name());
    }

    public function testTfootCreation(): void
    {
        $tfoot = new tfoot();
        $this->assertInstanceOf(tfoot::class, $tfoot);
        $this->assertEquals('tfoot', $tfoot->get_tag_name());
    }

    public function testTrCreation(): void
    {
        $tr = new tr();
        $this->assertInstanceOf(tr::class, $tr);
        $this->assertEquals('tr', $tr->get_tag_name());
    }

    public function testThCreation(): void
    {
        $th = new th('Header');
        $this->assertInstanceOf(th::class, $th);
        $this->assertEquals('th', $th->get_tag_name());
    }

    public function testThValue(): void
    {
        $th = new th('Name');
        $this->assertStringContainsString('Name', $th->generate());
    }

    public function testTdCreation(): void
    {
        $td = new td('Cell content');
        $this->assertInstanceOf(td::class, $td);
        $this->assertEquals('td', $td->get_tag_name());
    }

    public function testTdValue(): void
    {
        $td = new td('Data');
        $this->assertStringContainsString('Data', $td->generate());
    }

    public function testCaptionCreation(): void
    {
        $caption = new caption('Table Title');
        $this->assertInstanceOf(caption::class, $caption);
        $this->assertEquals('caption', $caption->get_tag_name());
    }

    public function testCaptionValue(): void
    {
        $caption = new caption('Monthly Report');
        $this->assertStringContainsString('Monthly Report', $caption->generate());
    }

    public function testTableWithRows(): void
    {
        $table = new table();
        $tbody = $table->append_tbody();
        $row = new tr();
        $row->append_child(new td('Cell 1'));
        $row->append_child(new td('Cell 2'));
        $tbody->append_child($row);
        $this->assertCount(1, $tbody->get_childs());
    }
}