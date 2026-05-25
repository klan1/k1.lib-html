<?php
$component_name = 'Main';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Main Element</h2>
    <div class="component-ref">\k1lib\html\main &rarr; src/klan1/html/main.php</div>

    <div class="preview-label">Basic Main</div>
    <div class="preview-box">
        <?php
        $main = new \k1lib\html\main();
        $main->set_class('container');

        $h1 = new \k1lib\html\h1();
        $h1->set_value('Main Content');

        $p = new \k1lib\html\p();
        $p->set_value('This is the main content area of the page.');

        $main->append_child($h1);
        $main->append_child($p);

        echo $main->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Main element</span>
<span class="text-warning">$main</span> = <span class="text-info">new</span> \k1lib\html\main();
<span class="text-warning">$main</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\h1());

<span class="text-warning">echo</span> <span class="text-warning">$main</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>