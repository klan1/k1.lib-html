<?php
$component_name = 'Unordered List';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Unordered List (ul)</h2>
    <div class="component-ref">\k1lib\html\ul &rarr; src/klan1/html/ul.php</div>

    <div class="preview-label">Basic Unordered List</div>
    <div class="preview-box">
        <?php
        $ul = new \k1lib\html\ul();

        $li1 = new \k1lib\html\li();
        $li1->set_value('First item');

        $li2 = new \k1lib\html\li();
        $li2->set_value('Second item');

        $li3 = new \k1lib\html\li();
        $li3->set_value('Third item');

        $ul->append_child($li1);
        $ul->append_child($li2);
        $ul->append_child($li3);

        echo $ul->generate();
        ?>
    </div>

    <div class="preview-label">Styled List with Bootstrap</div>
    <div class="preview-box">
        <?php
        $ul2 = new \k1lib\html\ul('list-group');
        $ul2->set_attrib('style', 'max-width: 300px;');

        $items = ['Feature One', 'Feature Two', 'Feature Three'];
        foreach ($items as $itemText) {
            $li = new \k1lib\html\li('list-group-item');
            $li->set_value($itemText);
            $ul2->append_child($li);
        }

        echo $ul2->generate();
        ?>
    </div>

    <div class="preview-label">Nested Lists</div>
    <div class="preview-box">
        <?php
        $ul3 = new \k1lib\html\ul();

        $li4 = new \k1lib\html\li();
        $li4->set_value('Parent Item 1');

        $li5 = new \k1lib\html\li();
        $li5->set_value('Parent Item 2');

        $subUl = new \k1lib\html\ul('sub-list');
        $subLi1 = new \k1lib\html\li();
        $subLi1->set_value('Sub item A');
        $subLi2 = new \k1lib\html\li();
        $subLi2->set_value('Sub item B');
        $subUl->append_child($subLi1);
        $subUl->append_child($subLi2);

        $li5->append_child($subUl);

        $ul3->append_child($li4);
        $ul3->append_child($li5);

        echo $ul3->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic unordered list</span>
<span class="text-warning">$ul</span> = <span class="text-info">new</span> \k1lib\html\ul();
<span class="text-warning">$ul</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\li(<span class="textsuccess">'Item 1'</span>));
<span class="text-warning">$ul</span>-><span class="text-light">append_child</span>(<span class="text-info">new</span> \k1lib\html\li(<span class="textsuccess">'Item 2'</span>));

<span class="text-primary">// With Bootstrap classes</span>
<span class="text-warning">$ul</span> = <span class="text-info">new</span> \k1lib\html\ul(<span class="textsuccess">'list-group'</span>);

<span class="text-primary">// Nested lists</span>
<span class="text-warning">$subUl</span> = <span class="text-info">new</span> \k1lib\html\ul();
<span class="text-warning">$parentLi</span>-><span class="text-light">append_child</span>(<span class="textwarning">$subUl</span>);

<span class="text-warning">echo</span> <span class="text-warning">$ul</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>