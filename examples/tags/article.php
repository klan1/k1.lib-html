<?php
$component_name = 'Article';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Article Element</h2>
    <div class="component-ref">\k1lib\html\article &rarr; src/klan1/html/article.php</div>

    <div class="preview-label">Basic Article</div>
    <div class="preview-box">
        <?php
        $article = new \k1lib\html\article();
        $article->set_class('border rounded p-3');

        $h2 = new \k1lib\html\h2();
        $h2->set_value('Article Title');

        $p = new \k1lib\html\p();
        $p->set_value('Article content goes here.');

        $article->append_child($h2);
        $article->append_child($p);

        echo $article->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Article element</span>
<span class="text-warning">$article</span> = <span class="text-info">new</span> \k1lib\html\article();
<span class="text-warning">$article</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\h2());

<span class="text-warning">echo</span> <span class="text-warning">$article</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>