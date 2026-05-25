<?php
$component_name = 'Ordered List';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Ordered List (ol)</h2>
    <div class="component-ref">\k1lib\html\ol &rarr; src/klan1/html/ol.php</div>

    <div class="preview-label">Basic Ordered List</div>
    <div class="preview-box">
        <?php
        $ol = new \k1lib\html\ol();

        $li1 = new \k1lib\html\li();
        $li1->set_value('First item');

        $li2 = new \k1lib\html\li();
        $li2->set_value('Second item');

        $li3 = new \k1lib\html\li();
        $li3->set_value('Third item');

        $ol->append_child($li1);
        $ol->append_child($li2);
        $ol->append_child($li3);

        echo $ol->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Ordered list</span>
<span class="text-warning">$ol</span> = <span class="text-info">new</span> \k1lib\html\ol();
<span class="text-warning">$ol</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\li(<span class="textsuccess">'Item 1'</span>));
<span class="text-warning">$ol</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\li(<span class="textsuccess">'Item 2'</span>));

<span class="text-warning">echo</span> <span class="text-warning">$ol</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>