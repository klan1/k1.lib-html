<?php
$component_name = 'Preformatted';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Preformatted (pre)</h2>
    <div class="component-ref">\k1lib\html\pre &rarr; src/klan1/html/pre.php</div>

    <div class="preview-label">Preformatted Text</div>
    <div class="preview-box">
        <?php
        $pre = new \k1lib\html\pre('function hello() {
    echo "Hello World";
    return true;
}');

        echo $pre->generate();
        ?>
    </div>

    <div class="preview-label">Pre with Code</div>
    <div class="preview-box">
        <?php
        $pre2 = new \k1lib\html\pre('1 + 2 = 3
a + b = c
x * y = z');

        echo $pre2->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Pre: (value, class)</span>
<span class="text-warning">$pre</span> = <span class="text-info">new</span> \k1lib\html\pre(<span class="textsuccess">'Line 1
Line 2
Line 3'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$pre</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>