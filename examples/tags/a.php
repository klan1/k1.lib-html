<?php
$component_name = 'Anchor';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Anchor (a) Element</h2>
    <div class="component-ref">\k1lib\html\a &rarr; src/klan1/html/a.php</div>

    <div class="preview-label">Basic Links</div>
    <div class="preview-box">
        <?php
$link1 = new \k1lib\html\a('https://github.com/klan1', 'Visit GitHub', '_blank');
        echo $link1->generate() . ' ';

        $link3 = new \k1lib\html\a('mailto:info@example.com', 'Send Email');
        echo $link3->generate();
        ?>
    </div>

    <div class="preview-label">Link with Classes and Attributes</div>
    <div class="preview-box">
        <?php
        $link4 = new \k1lib\html\a('https://github.com', 'GitHub Profile', '_blank');
        $link4->set_class('btn btn-primary');
        echo $link4->generate() . ' ';

        $link5 = new \k1lib\html\a('/about', 'About Us', '_self');
        $link5->set_class('nav-link');
        echo $link5->generate() . ' ';

        $link6 = new \k1lib\html\a('#top', 'Back to Top', '_self');
        $link6->set_attrib('onclick', 'scrollToTop(); return false;');
        echo $link6->generate();
        ?>
    </div>

    <div class="preview-label">Links as Children of Nav</div>
    <div class="preview-box">
        <?php
        $nav = new \k1lib\html\nav('navbar navbar-expand-lg navbar-light bg-light');
        $nav->set_attrib('role', 'navigation');

        $link7 = new \k1lib\html\a('/', 'Home', '_self');
        $link7->set_class('nav-link active');
        $link7->set_attrib('aria-current', 'page');

        $link8 = new \k1lib\html\a('/products', 'Products', '_self');
        $link8->set_class('nav-link');

        $link9 = new \k1lib\html\a('/contact', 'Contact', '_self');
        $link9->set_class('nav-link');

        $nav->append_child($link7);
        $nav->append_child($link8);
        $nav->append_child($link9);

        echo $nav->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic link</span>
<span class="text-warning">$link</span> = <span class="text-info">new</span> \k1lib\html\a(<span class="text-success">'https://github.com'</span>, <span class="text-success">'Visit GitHub'</span>, <span class="text-success">'_blank'</span>);

<span class="text-primary">// With Bootstrap classes</span>
<span class="text-warning">$link</span> = <span class="text-info">new</span> \k1lib\html\a(<span class="text-success">'https://github.com'</span>, <span class="text-success">'GitHub Profile'</span>, <span class="text-success">'_blank'</span>);
<span class="text-warning">$link</span>-><span class="text-light">set_class</span>(<span class="text-success">'btn btn-primary'</span>);

<span class="text-primary">// In navigation</span>
<span class="text-warning">$nav</span>-><span class="text-light">append_child</span>(<span class="text-warning">$link</span>);

<span class="text-warning">echo</span> <span class="text-warning">$link</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>