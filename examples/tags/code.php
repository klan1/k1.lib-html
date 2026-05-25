<?php
$component_name = 'Code';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Code Element</h2>
    <div class="component-ref">\k1lib\html\code &rarr; src/klan1/html/code.php</div>

    <div class="preview-label">Inline Code</div>
    <div class="preview-box">
        <?php
        $code = new \k1lib\html\code();
        $code->set_value('echo "Hello World";');

        $p = new \k1lib\html\p();
        $p->set_value('Use the function ');

        echo '<p>Use the function ' . $code->generate() . ' to print output.</p>';
        ?>
    </div>

    <div class="preview-label">Code with Class</div>
    <div class="preview-box">
        <?php
        $code2 = new \k1lib\html\code('bg-light p-2 rounded');
        $code2->set_value('var x = 10;');

        echo '<p>JavaScript: ' . $code2->generate() . '</p>';
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Inline code</span>
<span class="text-warning">$code</span> = <span class="text-info">new</span> \k1lib\html\code();
<span class="text-warning">$code</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'echo "Hello";'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$code</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>