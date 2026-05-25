<?php
$component_name = 'Emphasis';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Emphasis (em) Element</h2>
    <div class="component-ref">\k1lib\html\em &rarr; src/klan1/html/em.php</div>

    <div class="preview-label">Basic Emphasis</div>
    <div class="preview-box">
        <?php
        $em = new \k1lib\html\em();
        $em->set_value('Emphasized text');
        echo '<p>' . $em->generate() . '</p>';
        ?>
    </div>

    <div class="preview-label">Emphasis vs Regular</div>
    <div class="preview-box">
        <p>Regular text vs <em>emphasized text</em></p>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Emphasized text</span>
<span class="text-warning">$em</span> = <span class="text-info">new</span> \k1lib\html\em();
<span class="text-warning">$em</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'Emphasized'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$em</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>