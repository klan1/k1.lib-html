<?php
$component_name = 'Table Data';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Table Data (td)</h2>
    <div class="component-ref">\k1lib\html\td &rarr; src/klan1/html/td.php</div>

    <div class="preview-label">Table Data Cells</div>
    <div class="preview-box">
        <?php
        $table = new \k1lib\html\table('table');

        $thead = new \k1lib\html\thead();
        $tr = new \k1lib\html\tr();
        $tr->append_child(new \k1lib\html\th('Name'));
        $tr->append_child(new \k1lib\html\th('Value'));
        $thead->append_child($tr);

        $tbody = new \k1lib\html\tbody();
        $tr2 = new \k1lib\html\tr();
        $tr2->append_child(new \k1lib\html\td('Item 1'));
        $tr2->append_child(new \k1lib\html\td('$100'));
        $tbody->append_child($tr2);

        $table->append_child($thead);
        $table->append_child($tbody);

        echo $table->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Table data cell</span>
<span class="text-warning">$td</span> = <span class="text-info">new</span> \k1lib\html\td(<span class="textsuccess">'Data'</span>);
<span class="text-warning">$tr</span>-><span class="text-light">append_child</span>(<span class="textwarning">$td</span>);</code></pre>
    </div>
</section>

</div></body></html>