<?php
$component_name = 'Table Header';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Table Header (th)</h2>
    <div class="component-ref">\k1lib\html\th &rarr; src/klan1/html/th.php</div>

    <div class="preview-label">Table Headers</div>
    <div class="preview-box">
        <?php
        $table = new \k1lib\html\table('table');

        $thead = new \k1lib\html\thead();
        $tr = new \k1lib\html\tr();
        $tr->append_child(new \k1lib\html\th('Name'));
        $tr->append_child(new \k1lib\html\th('Role'));
        $tr->append_child(new \k1lib\html\th('Department'));
        $thead->append_child($tr);

        $tbody = new \k1lib\html\tbody();
        $tr2 = new \k1lib\html\tr();
        $tr2->append_child(new \k1lib\html\td('John'));
        $tr2->append_child(new \k1lib\html\td('Manager'));
        $tr2->append_child(new \k1lib\html\td('Sales'));
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
        <pre class="code-content"><code><span class="text-primary">// Table header cell</span>
<span class="text-warning">$th</span> = <span class="text-info">new</span> \k1lib\html\th(<span class="textsuccess">'Header Text'</span>);
<span class="textwarning">$tr</span>-><span class="text-light">append_child</span>(<span class="textwarning">$th</span>);</code></pre>
    </div>
</section>

</div></body></html>