<?php
$component_name = 'Fieldset';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Fieldset Element</h2>
    <div class="component-ref">\k1lib\html\fieldset &rarr; src/klan1/html/fieldset.php</div>

    <div class="preview-label">Basic Fieldset</div>
    <div class="preview-box">
        <?php
        $fieldset = new \k1lib\html\fieldset('Personal Info');

        $label = new \k1lib\html\label('Name', 'name', 'form-label');
        $input = new \k1lib\html\input('text', 'name', '');
        $input->set_attrib('class', 'form-control mb-2');

        $label2 = new \k1lib\html\label('Email', 'email', 'form-label');
        $input2 = new \k1lib\html\input('email', 'email', '');
        $input2->set_attrib('class', 'form-control');

        $fieldset->append_child($label);
        $fieldset->append_child($input);
        $fieldset->append_child($label2);
        $fieldset->append_child($input2);

        echo $fieldset->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Fieldset: (legend)</span>
<span class="text-warning">$fieldset</span> = <span class="text-info">new</span> \k1lib\html\fieldset(<span class="textsuccess">'Title'</span>);
<span class="text-warning">$fieldset</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\input());

<span class="text-warning">echo</span> <span class="text-warning">$fieldset</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>