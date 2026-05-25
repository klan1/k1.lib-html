<?php
$component_name = 'Headings';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Heading Tags (h1 - h6)</h2>
    <div class="component-ref">\k1lib\html\h1, \k1lib\html\h2... &rarr; src/klan1/html/h*.php</div>

    <div class="preview-label">All Heading Levels</div>
    <div class="preview-box">
        <?php
        $h1 = new \k1lib\html\h1();
        $h1->set_value('Heading Level 1');
        echo $h1->generate();

        $h2 = new \k1lib\html\h2();
        $h2->set_value('Heading Level 2');
        echo $h2->generate();

        $h3 = new \k1lib\html\h3();
        $h3->set_value('Heading Level 3');
        echo $h3->generate();

        $h4 = new \k1lib\html\h4();
        $h4->set_value('Heading Level 4');
        echo $h4->generate();

        $h5 = new \k1lib\html\h5();
        $h5->set_value('Heading Level 5');
        echo $h5->generate();

        $h6 = new \k1lib\html\h6();
        $h6->set_value('Heading Level 6');
        echo $h6->generate();
        ?>
    </div>

    <div class="preview-label">Headings with Classes</div>
    <div class="preview-box">
        <?php
        $h1Styled = new \k1lib\html\h1('display-1');
        $h1Styled->set_value('Display Heading 1');
        echo $h1Styled->generate();

        $h2Styled = new \k1lib\html\h2('display-2');
        $h2Styled->set_value('Display Heading 2');
        echo $h2Styled->generate();

        $h3Styled = new \k1lib\html\h3('text-muted');
        $h3Styled->set_value('Muted Heading 3');
        echo $h3Styled->generate();
        ?>
    </div>

    <div class="preview-label">Headings as Children</div>
    <div class="preview-box">
        <?php
        $section = new \k1lib\html\section();

        $title = new \k1lib\html\h2('section-title text-primary');
        $title->set_value('Section Title');

        $subtitle = new \k1lib\html\h4('section-subtitle');
        $subtitle->set_value('Subsection Header');

        $section->append_child($title);
        $section->append_child($subtitle);

        echo $section->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Create heading elements</span>
<span class="text-warning">$h1</span> = <span class="text-info">new</span> \k1lib\html\h1();
<span class="text-warning">$h1</span>-><span class="text-light">set_value</span>(<span class="text-success">'Heading Level 1'</span>);

<span class="text-warning">$h2</span> = <span class="text-info">new</span> \k1lib\html\h2();
<span class="text-warning">$h2</span>-><span class="text-light">set_value</span>(<span class="text-success">'Heading Level 2'</span>);

<span class="text-primary">// With Bootstrap classes</span>
<span class="text-warning">$h1</span> = <span class="text-info">new</span> \k1lib\html\h1(<span class="text-success">'display-1'</span>);
<span class="text-warning">$h1</span>-><span class="text-light">set_value</span>(<span class="text-success">'Display Heading'</span>);

<span class="text-primary">// As children of containers</span>
<span class="text-warning">$section</span> = <span class="text-info">new</span> \k1lib/html\section();
<span class="text-warning">$section</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\h2());

<span class="text-warning">echo</span> <span class="text-warning">$h1</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>