<?php
$component_name = 'Horizontal Rule';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Horizontal Rule (hr)</h2>
    <div class="component-ref">\k1lib\html\hr &rarr; src/klan1/html/hr.php</div>

    <div class="preview-label">Horizontal Rules</div>
    <div class="preview-box">
        <?php
        $p1 = new \k1lib\html\p();
        $p1->set_value('Content above the line.');

        $hr = new \k1lib\html\hr();

        $p2 = new \k1lib\html\p();
        $p2->set_value('Content below the line.');

        echo $p1->generate() . $hr->generate() . $p2->generate();
        ?>
    </div>

    <div class="preview-label">Styled HR</div>
    <div class="preview-box">
        <?php
        $hr2 = new \k1lib\html\hr();
        $hr2->set_class('border-primary');
        echo $hr2->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Horizontal rule</span>
<span class="text-warning">$hr</span> = <span class="text-info">new</span> \k1lib\html\hr();
<span class="text-warning">echo</span> <span class="text-warning">$hr</span>-><span class="text-light">generate</span>();

<span class="text-primary">// With class</span>
<span class="text-warning">$hr</span>-><span class="text-light">set_class</span>(<span class="textsuccess">'border-primary'</span>);</code></pre>
    </div>
</section>

</div></body></html>