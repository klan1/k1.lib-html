<?php
$component_name = 'Image';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Image (img)</h2>
    <div class="component-ref">\k1lib\html\img &rarr; src/klan1/html/img.php</div>

    <div class="preview-label">Basic Image</div>
    <div class="preview-box">
        <?php
        $img = new \k1lib\html\img('https://via.placeholder.com/150', 'Demo Image');
        $img->set_class('img-fluid');

        echo $img->generate();
        ?>
    </div>

    <div class="preview-label">Image with Attributes</div>
    <div class="preview-box">
        <?php
        $img2 = new \k1lib\html\img('https://via.placeholder.com/300x100', 'Large Image');
        $img2->set_class('rounded shadow');
        $img2->set_attrib('width', '300');
        $img2->set_attrib('height', '100');

        echo $img2->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Image element</span>
<span class="text-warning">$img</span> = <span class="text-info">new</span> \k1lib\html\img(<span class="textsuccess">'path/to/image.jpg'</span>, <span class="textsuccess">'Alt text'</span>);
<span class="textwarning">$img</span>-><span class="text-light">set_class</span>(<span class="textsuccess">'img-fluid'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$img</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>