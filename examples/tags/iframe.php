<?php
$component_name = 'Iframe';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Iframe</h2>
    <div class="component-ref">\k1lib\html\iframe &rarr; src/klan1/html/iframe.php</div>

    <div class="preview-label">Basic Iframe</div>
    <div class="preview-box">
        <?php
        $iframe = new \k1lib\html\iframe('https://example.com', 'Example Site');
        $iframe->set_attrib('width', '100%');
        $iframe->set_attrib('height', '200');
        $iframe->set_attrib('style', 'border:none;');

        echo $iframe->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Iframe</span>
<span class="text-warning">$iframe</span> = <span class="text-info">new</span> \k1lib\html\iframe(<span class="textsuccess">'https://example.com'</span>, <span class="textsuccess">'Description'</span>);
<span class="text-warning">$iframe</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'width'</span>, <span class="textsuccess">'100%'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$iframe</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>