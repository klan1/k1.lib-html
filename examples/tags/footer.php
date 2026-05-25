<?php
$component_name = 'Footer';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Footer Element</h2>
    <div class="component-ref">\k1lib\html\footer &rarr; src/klan1/html/footer.php</div>

    <div class="preview-label">Basic Footer</div>
    <div class="preview-box">
        <?php
        $footer = new \k1lib\html\footer();
        $footer->set_class('bg-dark text-white p-3 mt-3');

        $p = new \k1lib\html\p();
        $p->set_value('&copy; 2026 Company Name. All rights reserved.');

        $footer->append_child($p);

        echo $footer->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Footer element</span>
<span class="text-warning">$footer</span> = <span class="text-info">new</span> \k1lib\html\footer();
<span class="text-warning">$footer</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\p());

<span class="text-warning">echo</span> <span class="text-warning">$footer</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>