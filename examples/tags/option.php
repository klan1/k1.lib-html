<?php
$component_name = 'Option';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Option Element</h2>
    <div class="component-ref">\k1lib\html\option &rarr; src/klan1/html/option.php</div>

    <div class="preview-label">Option in Select</div>
    <div class="preview-box">
        <?php
        $select = new \k1lib\html\select('country');
        $select->set_attrib('class', 'form-select');

        $opt1 = new \k1lib\html\option('us', 'United States');
        $opt2 = new \k1lib\html\option('uk', 'United Kingdom');
        $opt3 = new \k1lib\html\option('ca', 'Canada', true);

        $select->append_child($opt1);
        $select->append_child($opt2);
        $select->append_child($opt3);

        echo $select->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Option: (value, label, selected, class)</span>
<span class="text-warning">$opt</span> = <span class="text-info">new</span> \k1lib\html\option(<span class="textsuccess">'us'</span>, <span class="textsuccess">'United States'</span>);
<span class="text-warning">$opt2</span> = <span class="text-info">new</span> \k1lib\html\option(<span class="textsuccess">'uk'</span>, <span class="textsuccess">'United Kingdom'</span>, <span class="text-info">true</span>);

<span class="text-warning">$select</span>-><span class="text-light">append_child</span>(<span class="textwarning">$opt</span>);</code></pre>
    </div>
</section>

</div></body></html>