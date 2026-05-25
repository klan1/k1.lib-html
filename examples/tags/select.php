<?php
$component_name = 'Select';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Select Element</h2>
    <div class="component-ref">\k1lib\html\select &rarr; src/klan1/html/select.php</div>

    <div class="preview-label">Basic Select</div>
    <div class="preview-box">
        <?php
        $select = new \k1lib\html\select('country');
        $select->set_attrib('class', 'form-select');

        $opt1 = new \k1lib\html\option('us', 'United States');
        $opt2 = new \k1lib\html\option('uk', 'United Kingdom');
        $opt3 = new \k1lib\html\option('ca', 'Canada');

        $select->append_child($opt1);
        $select->append_child($opt2);
        $select->append_child($opt3);

        echo $select->generate();
        ?>
    </div>

    <div class="preview-label">Select with append_option()</div>
    <div class="preview-box">
        <?php
        $select2 = new \k1lib\html\select('topic');
        $select2->set_attrib('class', 'form-select');
        $select2->append_option('gen', 'General');
        $select2->append_option('sup', 'Support');
        $select2->append_option('sales', 'Sales', true);

        echo $select2->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Select: (name, class)</span>
<span class="text-warning">$select</span> = <span class="text-info">new</span> \k1lib\html\select(<span class="textsuccess">'country'</span>);
<span class="text-warning">$select</span>-><span class="text-light">append_option</span>(<span class="textsuccess">'us'</span>, <span class="text-success">'USA'</span>);
<span class="text-warning">$select</span>-><span class="text-light">append_option</span>(<span class="textsuccess">'uk'</span>, <span class="textsuccess">'UK'</span>, <span class="text-info">true</span>);

<span class="text-warning">echo</span> <span class="text-warning">$select</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>