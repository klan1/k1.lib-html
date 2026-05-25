<?php
$component_name = 'Input';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Input Element</h2>
    <div class="component-ref">\k1lib\html\input &rarr; src/klan1/html/input.php</div>

    <div class="preview-label">Text Inputs</div>
    <div class="preview-box">
        <?php
        $input1 = new \k1lib\html\input('text', 'username', '');
        $input1->set_attrib('class', 'form-control mb-2');
        $input1->set_attrib('placeholder', 'Username');

        $input2 = new \k1lib\html\input('text', 'email', '');
        $input2->set_attrib('class', 'form-control mb-2');
        $input2->set_attrib('placeholder', 'Email Address');

        $input3 = new \k1lib\html\input('password', 'password', '');
        $input3->set_attrib('class', 'form-control');
        $input3->set_attrib('placeholder', 'Password');

        echo $input1->generate() . '<br><br>' . $input2->generate() . '<br><br>' . $input3->generate();
        ?>
    </div>

    <div class="preview-label">Number and Range Inputs</div>
    <div class="preview-box">
        <?php
        $input4 = new \k1lib\html\input('number', 'quantity', '5');
        $input4->set_attrib('class', 'form-control mb-2');
        $input4->set_attrib('min', '1');
        $input4->set_attrib('max', '100');

        $input5 = new \k1lib\html\input('range', 'rating', '7');
        $input5->set_attrib('class', 'form-range mb-2');
        $input5->set_attrib('min', '0');
        $input5->set_attrib('max', '10');

        echo 'Number: ' . $input4->generate() . '<br><br>Range: ' . $input5->generate();
        ?>
    </div>

    <div class="preview-label">Checkbox and Radio</div>
    <div class="preview-box">
        <?php
        $checkbox = new \k1lib\html\input('checkbox', 'subscribe', '1');
        $checkbox->set_attrib('class', 'form-check-input me-2');

        $label = new \k1lib\html\label('Subscribe to newsletter', '', 'form-check-label');
        $label->pre_value('<div class="form-check">');
        $label->post_value('</div>');

        echo $checkbox->generate() . ' ' . $label->generate();
        ?>
    </div>

    <div class="preview-label">File and Hidden Inputs</div>
    <div class="preview-box">
        <?php
        $fileInput = new \k1lib\html\input('file', 'document', '');
        $fileInput->set_attrib('class', 'form-control mb-2');
        $fileInput->set_attrib('accept', '.pdf,.doc,.docx');

        $hiddenInput = new \k1lib\html\input('hidden', 'token', 'abc123xyz');

        echo 'File: ' . $fileInput->generate() . '<br><br>Hidden value: ' . $hiddenInput->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Input: (type, name, value, class)</span>
<span class="text-warning">$input</span> = <span class="text-info">new</span> \k1lib\html\input(<span class="textsuccess">'text'</span>, <span class="text-success">'username'</span>, <span class="textsuccess">''</span>);
<span class="text-warning">$input</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'class'</span>, <span class="textsuccess">'form-control'</span>);
<span class="text-warning">$input</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'placeholder'</span>, <span class="textsuccess">'Username'</span>);

<span class="text-primary">// With value in constructor</span>
<span class="text-warning">$input</span> = <span class="text-info">new</span> \k1lib\html\input(<span class="textsuccess">'number'</span>, <span class="textsuccess">'quantity'</span>, <span class="textsuccess">'5'</span>);

<span class="textprimary">// Checkbox</span>
<span class="text-warning">$input</span> = <span class="text-info">new</span> \k1lib\html\input(<span class="textsuccess">'checkbox'</span>, <span class="textsuccess">'agree'</span>, <span class="textsuccess">'1'</span>);

<span class="text-warning">echo</span> <span class="text-warning">$input</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>