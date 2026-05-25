<?php
$component_name = 'Head';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Head Element</h2>
    <div class="component-ref">\k1lib\html\head &rarr; src/klan1/html/head.php</div>

    <div class="preview-label">Head Element Usage</div>
    <div class="preview-box">
        <p>See the HTML Document example for head element usage in context.</p>
        <a href="html_document.php" class="btn btn-outline-primary btn-sm">View HTML Document Example</a>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Head element (used in html_document)</span>
<span class="text-warning">$head</span> = <span class="text-info">new</span> \k1lib\html\head();
<span class="textwarning">$head</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\title(<span class="textsuccess">'Page Title'</span>));

<span class="text-warning">echo</span> <span class="text-warning">$head</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>