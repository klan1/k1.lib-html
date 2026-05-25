<?php
$component_name = 'Table Foot';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Table Foot (tfoot)</h2>
    <div class="component-ref">\k1lib\html\tfoot &rarr; src/klan1/html/tfoot.php</div>

    <div class="preview-label">Table with tfoot</div>
    <div class="preview-box">
        <?php
        $table = new \k1lib\html\table('table table-striped');

        $thead = new \k1lib\html\thead();
        $tr = new \k1lib\html\tr();
        $tr->append_child(new \k1lib\html\th('Product'));
        $tr->append_child(new \k1lib\html\th('Price'));
        $thead->append_child($tr);

        $tbody = new \k1lib\html\tbody();
        $tr2 = new \k1lib\html\tr();
        $tr2->append_child(new \k1lib\html\td('Widget'));
        $tr2->append_child(new \k1lib\html\td('$10.00'));
        $tbody->append_child($tr2);

        $tfoot = new \k1lib\html\tfoot();
        $tr3 = new \k1lib\html\tr();
        $tr3->append_child(new \k1lib\html\td('Total'));
        $tr3->append_child(new \k1lib\html\td('$10.00'));
        $tfoot->append_child($tr3);

        $table->append_child($thead);
        $table->append_child($tbody);
        $table->append_child($tfoot);

        echo $table->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Table foot</span>
<span class="text-warning">$tfoot</span> = <span class="text-info">new</span> \k1lib\html\tfoot();
<span class="text-warning">$tr</span> = <span class="text-info">new</span> \k1lib\html\tr();
<span class="text-warning">$tr</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\td(<span class="textsuccess">'Total'</span>));
<span class="textwarning">$tfoot</span>-><span class="text-light">append_child</span>(<span class="textwarning">$tr</span>);</code></pre>
    </div>
</section>

</div></body></html>