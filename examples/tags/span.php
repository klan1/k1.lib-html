<?php
$component_name = 'Span';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Span Element</h2>
    <div class="component-ref">\k1lib\html\span &rarr; src/klan1/html/span.php</div>

    <div class="preview-label">Basic Span</div>
    <div class="preview-box">
        <?php
        $span = new \k1lib\html\span();
        $span->set_value('This is a span element');
        echo '<p>' . $span->generate() . '</p>';
        ?>
    </div>

    <div class="preview-label">Styled Spans</div>
    <div class="preview-box">
        <?php
        $span1 = new \k1lib\html\span('text-primary fw-bold');
        $span1->set_value('Blue Bold');

        $span2 = new \k1lib\html\span('text-danger');
        $span2->set_value('Red Text');

        $span3 = new \k1lib\html\span('bg-warning');
        $span3->set_value('Yellow Background');

        echo '<p>' . $span1->generate() . ' | ' . $span2->generate() . ' | ' . $span3->generate() . '</p>';
        ?>
    </div>

    <div class="preview-label">Inline with Text</div>
    <div class="preview-box">
        <?php
        $p = new \k1lib\html\p();
        $p->set_value('This is a paragraph with a ');

        $span4 = new \k1lib\html\span('text-danger fw-bold');
        $span4->set_value('highlighted');

        $span5 = new \k1lib\html\span();
        $span5->set_value(' word.');

        $p->append_child($span4);
        $p->append_child($span5);

        echo '<p>This is a paragraph with a </p>' . '<p><span class="text-danger fw-bold">highlighted</span><span> word.</span></p>';
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic span</span>
<span class="text-warning">$span</span> = <span class="text-info">new</span> \k1lib\html\span();
<span class="text-warning">$span</span>-><span class="text-light">set_value</span>(<span class="text-success">'Text'</span>);

<span class="text-primary">// With class</span>
<span class="text-warning">$span</span> = <span class="text-info">new</span> \k1lib\html\span(<span class="textsuccess">'text-primary fw-bold'</span>);
<span class="text-warning">$span</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'Styled'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$span</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>