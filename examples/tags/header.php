<?php
$component_name = 'Header';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Header Element</h2>
    <div class="component-ref">\k1lib\html\header &rarr; src/klan1/html/header.php</div>

    <div class="preview-label">Basic Header</div>
    <div class="preview-box">
        <?php
        $header = new \k1lib\html\header();
        $header->set_class('bg-primary text-white p-3');

        $h1 = new \k1lib\html\h1();
        $h1->set_value('Page Title');

        $header->append_child($h1);

        echo $header->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Header element</span>
<span class="text-warning">$header</span> = <span class="text-info">new</span> \k1lib\html\header();
<span class="text-warning">$header</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\h1());

<span class="text-warning">echo</span> <span class="text-warning">$header</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>