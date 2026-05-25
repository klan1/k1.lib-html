<?php
$component_name = 'Aside';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Aside Element</h2>
    <div class="component-ref">\k1lib\html\aside &rarr; src/klan1/html/aside.php</div>

    <div class="preview-label">Basic Aside</div>
    <div class="preview-box">
        <?php
        $aside = new \k1lib\html\aside();
        $aside->set_class('bg-light p-3 border rounded');

        $h3 = new \k1lib\html\h3();
        $h3->set_value('Related Content');

        $p = new \k1lib\html\p();
        $p->set_value('This is aside/sidebar content.');

        $aside->append_child($h3);
        $aside->append_child($p);

        echo $aside->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Aside element</span>
<span class="text-warning">$aside</span> = <span class="text-info">new</span> \k1lib\html\aside();
<span class="text-warning">$aside</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\h3());

<span class="text-warning">echo</span> <span class="text-warning">$aside</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>