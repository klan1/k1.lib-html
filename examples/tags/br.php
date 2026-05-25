<?php
$component_name = 'Line Break';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Line Break (br)</h2>
    <div class="component-ref">\k1lib\html\br &rarr; src/klan1/html/br.php</div>

    <div class="preview-label">Line Breaks</div>
    <div class="preview-box">
        <?php
        $p = new \k1lib\html\p();
        $p->set_value('First line');

        $br = new \k1lib\html\br();

        $p2 = new \k1lib\html\p();
        $p2->set_value('Second line');

        echo '<p>First line' . $br->generate() . 'Second line</p>';
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Line break</span>
<span class="text-warning">$br</span> = <span class="text-info">new</span> \k1lib\html\br();
<span class="text-warning">echo</span> <span class="text-warning">$br</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>