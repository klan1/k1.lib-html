<?php
$component_name = 'HTML Document';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">HTML Document Structure</h2>
    <div class="component-ref">\k1lib\html\html_document &rarr; src/klan1/html/html_document.php</div>

    <div class="preview-label">Complete HTML Document</div>
    <div class="preview-box">
        <?php
        $doc = new \k1lib\html\html_document();
        $doc->set_lang('en');
        $doc->set_charset('utf-8');
        $doc->set_viewport('width=device-width, initial-scale=1');

        $title = new \k1lib\html\title('My Page Title');
        $doc->head()->append_child($title);

        $metaDesc = new \k1lib\html\meta();
        $metaDesc->set_attrib('name', 'description');
        $metaDesc->set_attrib('content', 'Page description here');
        $doc->head()->append_child($metaDesc);

        $body = $doc->body();

        $header = new \k1lib\html\header('bg-primary text-white p-3 mb-3');
        $h1 = new \k1lib\html\h1();
        $h1->set_value('Hello from k1.lib-html');
        $header->append_child($h1);

        $main = new \k1lib\html\main('container');
        $p = new \k1lib\html\p();
        $p->set_value('This document was generated using k1.lib-html library.');
        $main->append_child($header);
        $main->append_child($p);

        $body->append_child($main);

        echo '<pre style="background:#f5f5f5;padding:1rem;overflow:auto;max-height:200px;">' . htmlspecialchars($doc->generate()) . '</pre>';
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Create HTML document</span>
<span class="text-warning">$doc</span> = <span class="text-info">new</span> \k1lib\html\html_document();
<span class="text-warning">$doc</span>-><span class="text-light">set_lang</span>(<span class="text-success">'en'</span>);
<span class="text-warning">$doc</span>-><span class="text-light">set_charset</span>(<span class="textsuccess">'utf-8'</span>);

<span class="text-primary">// Add title</span>
<span class="text-warning">$title</span> = <span class="text-info">new</span> \k1lib\html\title(<span class="textsuccess">'My Page'</span>);
<span class="text-warning">$doc</span>-><span class="text-light">head</span>()-><span class="text-light">append_child</span>(<span class="text-warning">$title</span>);

<span class="text-primary">// Add content to body</span>
<span class="text-warning">$body</span> = <span class="text-warning">$doc</span>-><span class="text-light">body</span>();
<span class="textwarning">$body</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\h1(<span class="textsuccess">'Hello'</span>));

<span class="text-warning">echo</span> <span class="text-warning">$doc</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>