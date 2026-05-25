<?php
$component_name = 'Table';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Table Element</h2>
    <div class="component-ref">\k1lib\html\table &rarr; src/klan1/html/table.php</div>

    <div class="preview-label">Basic Table</div>
    <div class="preview-box">
        <?php
        $table = new \k1lib\html\table('table table-striped');
        $table->set_attrib('border', '1');

        $thead = new \k1lib\html\thead();
        $headerRow = new \k1lib\html\tr();

        $th1 = new \k1lib\html\th('Name');
        $th2 = new \k1lib\html\th('Email');
        $th3 = new \k1lib\html\th('Role');

        $headerRow->append_child($th1);
        $headerRow->append_child($th2);
        $headerRow->append_child($th3);
        $thead->append_child($headerRow);

        $tbody = new \k1lib\html\tbody();

        $row1 = new \k1lib\html\tr();
        $row1->append_child(new \k1lib\html\td('John Doe'));
        $row1->append_child(new \k1lib\html\td('john@example.com'));
        $row1->append_child(new \k1lib\html\td('Admin'));

        $row2 = new \k1lib\html\tr();
        $row2->append_child(new \k1lib\html\td('Jane Smith'));
        $row2->append_child(new \k1lib\html\td('jane@example.com'));
        $row2->append_child(new \k1lib\html\td('User'));

        $row3 = new \k1lib\html\tr();
        $row3->append_child(new \k1lib\html\td('Bob Wilson'));
        $row3->append_child(new \k1lib\html\td('bob@example.com'));
        $row3->append_child(new \k1lib\html\td('Editor'));

        $tbody->append_child($row1);
        $tbody->append_child($row2);
        $tbody->append_child($row3);

        $table->append_child($thead);
        $table->append_child($tbody);

        echo $table->generate();
        ?>
    </div>

    <div class="preview-label">Table with Caption</div>
    <div class="preview-box">
        <?php
        $table2 = new \k1lib\html\table('table table-bordered table-hover');
        $table2->set_attrib('border', '1');

        $caption = new \k1lib\html\caption('User List');

        $thead2 = new \k1lib\html\thead('table-dark');
        $headerRow2 = new \k1lib\html\tr();
        $headerRow2->append_child(new \k1lib\html\th('#'));
        $headerRow2->append_child(new \k1lib\html\th('Task'));
        $headerRow2->append_child(new \k1lib\html\th('Status'));
        $thead2->append_child($headerRow2);

        $tbody2 = new \k1lib\html\tbody();
        $tbody2->append_child((new \k1lib\html\tr())->append_child(new \k1lib\html\td('1'))->append_child(new \k1lib\html\td('Design mockups'))->append_child(new \k1lib\html\td('Complete')));
        $tbody2->append_child((new \k1lib\html\tr())->append_child(new \k1lib\html\td('2'))->append_child(new \k1lib\html\td('Write documentation'))->append_child(new \k1lib\html\td('In Progress')));
        $tbody2->append_child((new \k1lib\html\tr())->append_child(new \k1lib\html\td('3'))->append_child(new \k1lib\html\td('Deploy to production'))->append_child(new \k1lib\html\td('Pending')));

        $table2->append_child($caption);
        $table2->append_child($thead2);
        $table2->append_child($tbody2);

        echo $table2->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Create table with Bootstrap classes</span>
<span class="text-warning">$table</span> = <span class="text-info">new</span> \k1lib\html\table(<span class="text-success">'table table-striped'</span>);

<span class="text-primary">// Table head</span>
<span class="text-warning">$thead</span> = <span class="text-info">new</span> \k1lib\html\thead();
<span class="textwarning">$headerRow</span> = <span class="text-info">new</span> \k1lib\html\tr();
<span class="text-warning">$headerRow</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\th(<span class="textsuccess">'Name'</span>));

<span class="textprimary">// Table body with rows</span>
<span class="text-warning">$tbody</span> = <span class="text-info">new</span> \k1lib\html\tbody();
<span class="text-warning">$row</span> = <span class="text-info">new</span> \k1lib\html\tr();
<span class="text-warning">$row</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\td(<span class="text-success">'Data'</span>));

<span class="text-warning">$table</span>-><span class="text-light">append_child</span>(<span class="text-warning">$thead</span>);
<span class="text-warning">$table</span>-><span class="text-light">append_child</span>(<span class="text-warning">$tbody</span>);
<span class="textwarning">echo</span> <span class="text-warning">$table</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>