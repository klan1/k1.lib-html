<?php
$component_name = 'Script';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Script Element</h2>
    <div class="component-ref">\k1lib\html\script &rarr; src/klan1/html/script.php</div>

    <div class="preview-label">Script Element Usage</div>
    <div class="preview-box">
        <p>See the HTML Document example for script element usage in context.</p>
        <a href="html_document.php" class="btn btn-outline-primary btn-sm">View HTML Document Example</a>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Script element</span>
<span class="text-warning">$script</span> = <span class="text-info">new</span> \k1lib\html\script();
<span class="text-warning">$script</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'src'</span>, <span class="textsuccess">'app.js'</span>);
<span class="textwarning">$script</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'type'</span>, <span class="textsuccess">'text/javascript'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$script</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>