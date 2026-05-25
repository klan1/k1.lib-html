<?php
$component_name = 'Strong';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Strong (strong) Element</h2>
    <div class="component-ref">\k1lib\html\strong &rarr; src/klan1/html/strong.php</div>

    <div class="preview-label">Basic Strong</div>
    <div class="preview-box">
        <?php
        $strong = new \k1lib\html\strong();
        $strong->set_value('Important text');
        echo '<p>' . $strong->generate() . '</p>';
        ?>
    </div>

    <div class="preview-label">Strong vs Bold</div>
    <div class="preview-box">
        <p><b>Bold (b)</b> is just for visual styling, while <strong>Strong (strong)</strong> indicates important text semantically.</p>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Strong importance</span>
<span class="text-warning">$strong</span> = <span class="text-info">new</span> \k1lib\html\strong();
<span class="text-warning">$strong</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'Important'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$strong</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>