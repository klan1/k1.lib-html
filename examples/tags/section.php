<?php
$component_name = 'Section';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Section Element</h2>
    <div class="component-ref">\k1lib\html\section &rarr; src/klan1/html/section.php</div>

    <div class="preview-label">Basic Section</div>
    <div class="preview-box">
        <?php
        $section = new \k1lib\html\section();
        $section->set_class('bg-light p-3 border rounded');

        $h2 = new \k1lib\html\h2();
        $h2->set_value('Section Title');

        $p = new \k1lib\html\p();
        $p->set_value('Section content goes here.');

        $section->append_child($h2);
        $section->append_child($p);

        echo $section->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Section container</span>
<span class="text-warning">$section</span> = <span class="text-info">new</span> \k1lib\html\section();
<span class="textwarning">$section</span>-><span class="text-light">set_class</span>(<span class="textsuccess">'bg-light p-3'</span>);

<span class="text-warning">$section</span>-><span class="text-light">append_child</span>(<span class="textinfo">new</span> \k1lib\html\h2());

<span class="textwarning">echo</span> <span class="text-warning">$section</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>