<?php
$component_name = 'Link';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Link Element</h2>
    <div class="component-ref">\k1lib\html\link &rarr; src/klan1/html/link.php</div>

    <div class="preview-label">Link Element Usage</div>
    <div class="preview-box">
        <p>See the HTML Document example for link element usage in context.</p>
        <a href="html_document.php" class="btn btn-outline-primary btn-sm">View HTML Document Example</a>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Link element</span>
<span class="text-warning">$link</span> = <span class="text-info">new</span> \k1lib\html\link();
<span class="text-warning">$link</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'rel'</span>, <span class="textsuccess">'stylesheet'</span>);
<span class="text-warning">$link</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'href'</span>, <span class="textsuccess">'style.css'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$link</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>