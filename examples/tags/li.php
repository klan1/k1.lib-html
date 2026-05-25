<?php
$component_name = 'List Item';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">List Item (li)</h2>
    <div class="component-ref">\k1lib\html\li &rarr; src/klan1/html/li.php</div>

    <div class="preview-label">List Items</div>
    <div class="preview-box">
        <?php
        $ul = new \k1lib\html\ul();

        $li1 = new \k1lib\html\li();
        $li1->set_value('First item');

        $li2 = new \k1lib\html\li();
        $li2->set_value('Second item');

        $ul->append_child($li1);
        $ul->append_child($li2);

        echo $ul->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// List item</span>
<span class="text-warning">$li</span> = <span class="text-info">new</span> \k1lib\html\li();
<span class="text-warning">$li</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'Item text'</span>);
<span class="textwarning">$ul</span>-><span class="text-light">append_child</span>(<span class="textwarning">$li</span>);</code></pre>
    </div>
</section>

</div></body></html>