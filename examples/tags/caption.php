<?php
$component_name = 'Caption';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Caption</h2>
    <div class="component-ref">\k1lib\html\caption &rarr; src/klan1/html/caption.php</div>

    <div class="preview-label">Table with Caption</div>
    <div class="preview-box">
        <?php
        $table = new \k1lib\html\table('table');

        $caption = new \k1lib\html\caption('User List');

        $thead = new \k1lib\html\thead();
        $tr = new \k1lib\html\tr();
        $tr->append_child(new \k1lib\html\th('Name'));
        $tr->append_child(new \k1lib\html\th('Email'));
        $thead->append_child($tr);

        $tbody = new \k1lib\html\tbody();
        $tr2 = new \k1lib\html\tr();
        $tr2->append_child(new \k1lib\html\td('John'));
        $tr2->append_child(new \k1lib\html\td('john@example.com'));
        $tbody->append_child($tr2);

        $table->append_child($caption);
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
        <pre class="code-content"><code><span class="text-primary">// Table caption</span>
<span class="text-warning">$caption</span> = <span class="text-info">new</span> \k1lib\html\caption(<span class="textsuccess">'Table Title'</span>);
<span class="text-warning">$table</span>-><span class="text-light">append_child</span>(<span class="textwarning">$caption</span>);</code></pre>
    </div>
</section>

</div></body></html>