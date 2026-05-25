<?php
$component_name = 'Legend';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Legend Element</h2>
    <div class="component-ref">\k1lib\html\legend &rarr; src/klan1/html/legend.php</div>

    <div class="preview-label">Basic Legend</div>
    <div class="preview-box">
        <?php
        $legend = new \k1lib\html\legend('Form Legend');
        echo $legend->generate();
        ?>
    </div>

    <div class="preview-label">Legend in Fieldset</div>
    <div class="preview-box">
        <?php
        $fieldset = new \k1lib\html\fieldset('Account Details');
        echo $fieldset->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Legend: (text)</span>
<span class="text-warning">$legend</span> = <span class="text-info">new</span> \k1lib\html\legend(<span class="textsuccess">'Title'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$legend</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>