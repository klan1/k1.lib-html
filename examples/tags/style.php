<?php
$component_name = 'Style';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Style Element</h2>
    <div class="component-ref">\k1lib\html\style &rarr; src/klan1/html/style.php</div>

    <div class="preview-label">Style Element Usage</div>
    <div class="preview-box">
        <?php
        $style = new \k1lib\html\style();
        $style->set_value('.custom { color: blue; }');

        echo '<pre>' . $style->generate() . '</pre>';
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Style element</span>
<span class="text-warning">$style</span> = <span class="text-info">new</span> \k1lib\html\style();
<span class="text-warning">$style</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'.custom { color: blue; }'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$style</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>