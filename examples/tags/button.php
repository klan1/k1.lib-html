<?php
$component_name = 'Button';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Button Element</h2>
    <div class="component-ref">\k1lib\html\button &rarr; src/klan1/html/button.php</div>

    <div class="preview-label">Basic Buttons</div>
    <div class="preview-box">
        <?php
        $btn1 = new \k1lib\html\button('Click Me');
        echo $btn1->generate() . ' ';

        $btn2 = new \k1lib\html\button('Primary', 'btn btn-primary');
        echo $btn2->generate() . ' ';

        $btn3 = new \k1lib\html\button('Secondary', 'btn btn-secondary');
        echo $btn3->generate();
        ?>
    </div>

    <div class="preview-label">Button Variants</div>
    <div class="preview-box">
        <?php
        $variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        foreach ($variants as $variant) {
            $btn = new \k1lib\html\button(ucfirst($variant), "btn btn-{$variant}");
            $btn->set_attrib('type', 'button');
            echo $btn->generate() . ' ';
        }
        ?>
    </div>

    <div class="preview-label">Outline Buttons</div>
    <div class="preview-box">
        <?php
        $btn4 = new \k1lib\html\button('Outline Primary', 'btn btn-outline-primary');
        $btn4->set_attrib('type', 'button');
        echo $btn4->generate() . ' ';

        $btn5 = new \k1lib\html\button('Outline Secondary', 'btn btn-outline-secondary');
        $btn5->set_attrib('type', 'button');
        echo $btn5->generate() . ' ';

        $btn6 = new \k1lib\html\button('Outline Success', 'btn btn-outline-success');
        $btn6->set_attrib('type', 'button');
        echo $btn6->generate();
        ?>
    </div>

    <div class="preview-label">Button Sizes</div>
    <div class="preview-box">
        <?php
        $btnSm = new \k1lib\html\button('Small', 'btn btn-primary btn-sm');
        $btnSm->set_attrib('type', 'button');
        echo $btnSm->generate() . ' ';

        $btnMd = new \k1lib\html\button('Medium', 'btn btn-primary');
        $btnMd->set_attrib('type', 'button');
        echo $btnMd->generate() . ' ';

        $btnLg = new \k1lib\html\button('Large', 'btn btn-primary btn-lg');
        $btnLg->set_attrib('type', 'button');
        echo $btnLg->generate();
        ?>
    </div>

    <div class="preview-label">Disabled Button</div>
    <div class="preview-box">
        <?php
        $btnDisabled = new \k1lib\html\button('Disabled', 'btn btn-primary');
        $btnDisabled->set_attrib('type', 'button');
        $btnDisabled->set_attrib('disabled', 'true');
        echo $btnDisabled->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic button</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> \k1lib\html\button(<span class="textsuccess">'Click Me'</span>);
<span class="text-warning">$btn</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'type'</span>, <span class="text-success">'button'</span>);

<span class="text-primary">// Bootstrap styled</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> \k1lib\html\button(<span class="textsuccess">'Submit'</span>, <span class="textsuccess">'btn btn-primary'</span>);

<span class="textprimary">// Variants and sizes</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> \k1lib\html\button(<span class="textsuccess">'Danger'</span>, <span class="textsuccess">'btn btn-danger btn-lg'</span>);

<span class="text-primary">// Disabled state</span>
<span class="text-warning">$btn</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'disabled'</span>, <span class="text-success">'true'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$btn</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>