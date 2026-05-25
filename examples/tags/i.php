<?php
/**
 * TODO: Implement automatic CSS font loading detection.
 * If icon classes are used but the CSS font library (e.g., Font Awesome) is not loaded,
 * the library should automatically inject the required CSS link into the document head.
 *
 * Implementation Ideas:
 * - Detect icon class prefixes (bi-, fa-, etc.) in set_class() calls
 * - Check if the corresponding CSS is already loaded in the document
 * - If not loaded, append the appropriate <link> to the <head> automatically
 *
 * @see https://github.com/klan1/k1.lib-html/issues
 */
$component_name = 'Icon';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Icon (i)</h2>
    <div class="component-ref">\k1lib\html\i &rarr; src/klan1/html/i.php</div>

    <div class="preview-label">Icon Elements</div>
    <div class="preview-box">
        <p><i class="fa-brands fa-github"></i> GitHub Icon</p>
        <p><i class="fa-solid fa-heart text-danger"></i> Heart Icon</p>
        <p><i class="fa-solid fa-star text-warning"></i> Star Icon</p>
    </div>

    <div class="preview-label">Icon with Font Awesome</div>
    <div class="preview-box">
        <?php
        $i = new \k1lib\html\i();
        $i->set_class('fa-solid fa-coffee text-success fs-3');

        echo '<p>' . $i->generate() . ' Cup Icon</p>';
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Icon element (for Font Awesome, etc.)</span>
<span class="text-warning">$icon</span> = <span class="text-info">new</span> \k1lib\html\i();
<span class="text-warning">$icon</span>-><span class="text-light">set_class</span>(<span class="text-success">'fa-solid fa-coffee text-success fs-3'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$icon</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>