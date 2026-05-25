<?php
$component_name = 'Label';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Label Element</h2>
    <div class="component-ref">\k1lib\html\label &rarr; src/klan1/html/label.php</div>

    <div class="preview-label">Basic Label</div>
    <div class="preview-box">
        <?php
        $label = new \k1lib\html\label('Email Address', 'email', 'form-label');
        echo $label->generate();
        ?>
    </div>

    <div class="preview-label">Label with Input</div>
    <div class="preview-box">
        <?php
        $label2 = new \k1lib\html\label('Username', 'username', 'form-label');
        $input = new \k1lib\html\input('text', 'username', '');
        $input->set_attrib('class', 'form-control');

        echo $label2->generate() . '<br>' . $input->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Label: (text, for, class)</span>
<span class="text-warning">$label</span> = <span class="text-info">new</span> \k1lib\html\label(<span class="textsuccess">'Email'</span>, <span class="textsuccess">'email'</span>, <span class="textsuccess">'form-label'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$label</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>