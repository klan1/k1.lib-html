<?php
$component_name = 'Paragraph';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Paragraph (p) Element</h2>
    <div class="component-ref">\k1lib\html\p &rarr; src/klan1/html/p.php</div>

    <div class="preview-label">Basic Paragraph</div>
    <div class="preview-box">
        <?php
        $p = new \k1lib\html\p();
        $p->set_value('This is a basic paragraph element created with k1.lib-html.');
        echo $p->generate();
        ?>
    </div>

    <div class="preview-label">Paragraph with Class</div>
    <div class="preview-box">
        <?php
        $p2 = new \k1lib\html\p('lead');
        $p2->set_value('This is a lead paragraph - larger and lighter text for introductions.');
        echo $p2->generate();

        $p3 = new \k1lib\html\p('text-muted small');
        $p3->set_value('This is a small, muted paragraph for secondary information.');
        echo $p3->generate();
        ?>
    </div>

    <div class="preview-label">Multiple Paragraphs</div>
    <div class="preview-box">
        <?php
        $paragraphs = [
            'First paragraph with some interesting content.',
            'Second paragraph providing additional details.',
            'Third paragraph concluding the thought.'
        ];

        foreach ($paragraphs as $text) {
            $para = new \k1lib\html\p();
            $para->set_value($text);
            $para->set_class('mb-3');
            echo $para->generate();
        }
        ?>
    </div>

    <div class="preview-label">Inline Content</div>
    <div class="preview-box">
        <?php
        $p4 = new \k1lib\html\p();

        $text1 = new \k1lib\html\span('fw-bold text-primary');
        $text1->set_value('Bold blue text');

        $text2 = new \k1lib\html\span('text-decoration-underline');
        $text2->set_value(' underlined text');

        $text3 = new \k1lib\html\span('fst-italic');
        $text3->set_value(' and italic text');

        $p4->append_child($text1);
        $p4->append_child($text2);
        $p4->append_child($text3);

        echo $p4->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic paragraph</span>
<span class="text-warning">$p</span> = <span class="text-info">new</span> \k1lib\html\p();
<span class="text-warning">$p</span>-><span class="text-light">set_value</span>(<span class="text-success">'Paragraph text'</span>);

<span class="text-primary">// With Bootstrap class</span>
<span class="text-warning">$p</span> = <span class="text-info">new</span> \k1lib\html\p(<span class="textsuccess">'lead'</span>);
<span class="text-warning">$p</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'Lead paragraph text'</span>);

<span class="text-primary">// With inline elements</span>
<span class="text-warning">$span</span> = <span class="text-info">new</span> \k1lib\html\span(<span class="textsuccess">'fw-bold'</span>);
<span class="text-warning">$span</span>-><span class="text-light">set_value</span>(<span class="textsuccess">'Bold'</span>);
<span class="text-warning">$p</span>-><span class="text-light">append_child</span>(<span class="textwarning">$span</span>);

<span class="text-warning">echo</span> <span class="text-warning">$p</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>