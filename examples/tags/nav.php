<?php
$component_name = 'Nav';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Nav Element</h2>
    <div class="component-ref">\k1lib\html\nav &rarr; src/klan1/html/nav.php</div>

    <div class="preview-label">Basic Nav</div>
    <div class="preview-box">
        <?php
        $nav = new \k1lib\html\nav();
        $nav->set_class('navbar navbar-expand-lg navbar-light bg-light');

        $ul = new \k1lib\html\ul('navbar-nav me-auto mb-2 mb-lg-0');

        $li1 = new \k1lib\html\li('nav-item');
        $a1 = new \k1lib\html\a('#', '_self');
        $a1->set_value('Home');
        $a1->set_class('nav-link active');
        $li1->append_child($a1);

        $li2 = new \k1lib\html\li('nav-item');
        $a2 = new \k1lib\html\a('#', '_self');
        $a2->set_value('About');
        $a2->set_class('nav-link');
        $li2->append_child($a2);

        $ul->append_child($li1);
        $ul->append_child($li2);
        $nav->append_child($ul);

        echo $nav->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Navigation</span>
<span class="text-warning">$nav</span> = <span class="text-info">new</span> \k1lib\html\nav();
<span class="textwarning">$nav</span>-><span class="text-light">set_class</span>(<span class="textsuccess">'navbar navbar-expand-lg'</span>);

<span class="textwarning">$ul</span> = <span class="text-info">new</span> \k1lib\html\ul(<span class="textsuccess">'navbar-nav'</span>);
<span class="text-warning">$li</span> = <span class="text-info">new</span> \k1lib\html\li();
<span class="text-warning">$a</span> = <span class="text-info">new</span> \k1lib\html\a(<span class="textsuccess">'#'</span>);
<span class="text-warning">$a</span>-><span class="text-light">set_class</span>(<span class="textsuccess">'nav-link'</span>);

<span class="textwarning">echo</span> <span class="text-warning">$nav</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>