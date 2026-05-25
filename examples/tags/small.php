<?php
$component_name = 'Small';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Small (small) Element</h2>
    <div class="component-ref">\k1lib\html\small &rarr; src/klan1/html/small.php</div>

    <div class="preview-label">Basic Small</div>
    <div class="preview-box">
        <?php
        $small = new \k1lib\html\small();
        $small->set_value('Small text');
        echo '<p>' . $small->generate() . '</p>';
        ?>
    </div>

    <div class="preview-label">Small for Secondary Text</div>
    <div class="preview-box">
        <p>Normal text <small>with smaller secondary text</small></p>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Small text</span>
<span class="text-warning">$small</span> = <span class="text-info">new</span> \k1lib\html\small();
<span class="text-warning">$small</span>-><span class="text-light">set_value</span>(<span class="text-success">'Small text'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$small</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>