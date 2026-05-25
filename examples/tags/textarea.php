<?php
$component_name = 'Textarea';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Textarea Element</h2>
    <div class="component-ref">\k1lib\html\textarea &rarr; src/klan1/html/textarea.php</div>

    <div class="preview-label">Basic Textarea</div>
    <div class="preview-box">
        <?php
        $textarea = new \k1lib\html\textarea('message');
        $textarea->set_attrib('class', 'form-control');
        $textarea->set_attrib('rows', '4');
        $textarea->set_value('Enter your message here...');

        echo $textarea->generate();
        ?>
    </div>

    <div class="preview-label">Textarea with Label</div>
    <div class="preview-box">
        <?php
        $label = new \k1lib\html\label('Comments', 'comments', 'form-label');

        $textarea2 = new \k1lib\html\textarea('comments');
        $textarea2->set_attrib('class', 'form-control');
        $textarea2->set_attrib('rows', '3');

        echo $label->generate() . '<br>' . $textarea2->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Textarea: (name, class)</span>
<span class="text-warning">$textarea</span> = <span class="text-info">new</span> \k1lib\html\textarea(<span class="textsuccess">'message'</span>);
<span class="text-warning">$textarea</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'rows'</span>, <span class="text-success">'4'</span>);
<span class="textwarning">$textarea</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'Default text'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$textarea</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>