<?php
$component_name = 'Div';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Div Element</h2>
    <div class="component-ref">\k1lib\html\div &rarr; src/klan1/html/div.php</div>

    <div class="preview-label">Basic Div</div>
    <div class="preview-box">
        <?php
        $div = new \k1lib\html\div('container', 'my-container');
        $div->set_value('Hello, I am a DIV element!');
        echo $div->generate();
        ?>
    </div>

    <div class="preview-label">Div with Class and ID</div>
    <div class="preview-box">
        <?php
        $div2 = new \k1lib\html\div('bg-primary text-white p-3 rounded', 'styled-div');
        $div2->set_value('Styled div with Bootstrap classes');
        echo $div2->generate();
        ?>
    </div>

    <div class="preview-label">Nested Divs with Chain Methods</div>
    <div class="preview-box">
        <?php
        $outer = new \k1lib\html\div('outer-container border p-3 mb-2');
        $inner1 = new \k1lib\html\div('inner-item bg-light p-2 mb-2');
        $inner1->set_value('Inner div 1');

        $inner2 = new \k1lib\html\div('inner-item bg-light p-2');
        $inner2->set_value('Inner div 2');

        $outer->append_child($inner1);
        $outer->append_child($inner2);

        echo $outer->generate();
        ?>
    </div>

    <div class="preview-label">Div with Child Elements</div>
    <div class="preview-box">
        <?php
        $card = new \k1lib\html\div('card shadow-sm p-3');
        $title = new \k1lib\html\h5();
        $title->set_value('Card Title');
        $title->set_class('card-title');

        $text = new \k1lib\html\p('This is some sample text inside the card.', 'card-text');
        $btn = new \k1lib\html\button('Click Me', 'btn btn-primary');
        $btn->set_attrib('type', 'button');

        $card->append_child($title);
        $card->append_child($text);
        $card->append_child($btn);

        echo $card->generate();
        ?>
    </div>

    <div class="preview-label">Append Methods</div>
    <div class="preview-box">
        <?php
        $container = new \k1lib\html\div('demo-container border p-3');

        $item1 = new \k1lib\html\div('bg-secondary text-white p-2 mb-2');
        $item1->set_value('Item 1');

        $item2 = new \k1lib\html\div('bg-info text-white p-2');
        $item2->set_value('Item 2');

        // Using append_to chain
        $item1->append_to($container);
        $item2->append_to($container);

        echo $container->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic div creation</span>
<span class="text-warning">$div</span> = <span class="text-info">new</span> \k1lib\html\div(<span class="text-success">'container'</span>, <span class="text-success">'my-container'</span>);
<span class="text-warning">$div</span>-><span class="text-light">set_value</span>(<span class="text-success">'Hello, I am a DIV element!'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$div</span>-><span class="text-light">generate</span>();

<span class="text-primary">// Nested divs</span>
<span class="text-warning">$outer</span> = <span class="text-info">new</span> \k1lib\html\div(<span class="text-success">'outer-container border p-3'</span>);
<span class="text-warning">$inner</span> = <span class="text-info">new</span> \k1lib\html\div(<span class="text-success">'inner bg-light p-2'</span>);
<span class="text-warning">$inner</span>-><span class="text-light">set_value</span>(<span class="text-success">'Content'</span>);
<span class="text-warning">$outer</span>-><span class="text-light">append_child</span>(<span class="text-warning">$inner</span>);
<span class="text-warning">echo</span> <span class="text-warning">$outer</span>-><span class="text-light">generate</span>();

<span class="text-primary">// Chain method style</span>
<span class="text-warning">$item</span>-><span class="text-light">append_to</span>(<span class="text-warning">$container</span>);</code></pre>
    </div>
</section>

</div></body></html>