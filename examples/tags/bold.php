<?php
$component_name = 'Bold';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Bold (b) Element</h2>
    <div class="component-ref">\k1lib\html\b &rarr; src/klan1/html/b.php</div>

    <div class="preview-label">Basic Bold Text</div>
    <div class="preview-box">
        <?php
        $b = new \k1lib\html\b();
        $b->set_value('This text is bold');
        echo '<p>' . $b->generate() . '</p>';
        ?>
    </div>

    <div class="preview-label">Bold in Context</div>
    <div class="preview-box">
        <?php
        $p = new \k1lib\html\p();
        $p->set_value('This is normal text and ');

        $bold = new \k1lib\html\b();
        $bold->set_value('this is bold');

        $p2 = new \k1lib\html\p();
        $p2->set_value(' and this is normal again.');

        echo '<p>'; echo 'This is normal text and '; echo $bold->generate(); echo ' and this is normal again.'; echo '</p>';
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Bold text</span>
<span class="text-warning">$bold</span> = <span class="text-info">new</span> \k1lib\html\b();
<span class="text-warning">$bold</span>-><span class="text-light">set_value</span>(<span class="text-success">'Bold text'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$bold</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>