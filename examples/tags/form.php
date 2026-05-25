<?php
$component_name = 'Form';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Form Element</h2>
    <div class="component-ref">\k1lib\html\form &rarr; src/klan1/html/form.php</div>

    <div class="preview-label">Basic Form</div>
    <div class="preview-box">
        <?php
        $form = new \k1lib\html\form();
        $form->set_attrib('action', '#');
        $form->set_attrib('method', 'POST');

        $label = new \k1lib\html\label('Username', '', 'form-label');
        $input = new \k1lib\html\input('text', 'username', '');
        $input->set_attrib('class', 'form-control mb-2');
        $input->set_attrib('placeholder', 'Enter username');

        $submit = new \k1lib\html\button('Submit');
        $submit->set_attrib('type', 'submit');
        $submit->set_attrib('class', 'btn btn-primary');

        $form->append_child($label);
        $form->append_child($input);
        $form->append_child($submit);

        echo $form->generate();
        ?>
    </div>

    <div class="preview-label">Login Form with Fieldset</div>
    <div class="preview-box">
        <?php
        $form2 = new \k1lib\html\form();
        $form2->set_attrib('action', 'login.php');
        $form2->set_attrib('method', 'POST');

        $fieldset = new \k1lib\html\fieldset('Login');

        $emailLabel = new \k1lib\html\label('Email Address', 'email', 'form-label');
        $emailInput = new \k1lib\html\input('email', 'email', '');
        $emailInput->set_attrib('class', 'form-control');
        $emailInput->set_attrib('required', 'true');

        $passLabel = new \k1lib\html\label('Password', 'password', 'form-label');
        $passInput = new \k1lib\html\input('password', 'password', '');
        $passInput->set_attrib('class', 'form-control mb-3');
        $passInput->set_attrib('required', 'true');

        $submitBtn = new \k1lib\html\button('Sign In', 'btn btn-success w-100');
        $submitBtn->set_attrib('type', 'submit');

        $fieldset->append_child($emailLabel);
        $fieldset->append_child($emailInput);
        $fieldset->append_child($passLabel);
        $fieldset->append_child($passInput);
        $fieldset->append_child($submitBtn);

        $form2->append_child($fieldset);
        echo $form2->generate();
        ?>
    </div>

    <div class="preview-label">Textarea and Select</div>
    <div class="preview-box">
        <?php
        $form3 = new \k1lib\html\form();
        $form3->set_attrib('action', '#');

        $commentLabel = new \k1lib\html\label('Comments', 'comments', 'form-label');
        $textarea = new \k1lib\html\textarea('comments');
        $textarea->set_attrib('class', 'form-control');
        $textarea->set_attrib('rows', '3');
        $textarea->set_value('Enter your comments here...');

        $topicLabel = new \k1lib\html\label('Topic', 'topic', 'form-label');
        $select = new \k1lib\html\select('topic');
        $select->set_attrib('class', 'form-select mb-3');
        $option1 = new \k1lib\html\option('general', 'General Inquiry');
        $option2 = new \k1lib\html\option('support', 'Technical Support');
        $option3 = new \k1lib\html\option('feedback', 'Feedback');
        $select->append_child($option1);
        $select->append_child($option2);
        $select->append_child($option3);

        $submitBtn2 = new \k1lib\html\button('Send', 'btn btn-primary');

        $form3->append_child($commentLabel);
        $form3->append_child($textarea);
        $form3->append_child($topicLabel);
        $form3->append_child($select);
        $form3->append_child($submitBtn2);

        echo $form3->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic form</span>
<span class="text-warning">$form</span> = <span class="text-info">new</span> \k1lib\html\form();
<span class="text-warning">$form</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'action'</span>, <span class="textsuccess">'submit.php'</span>);
<span class="textwarning">$form</span>-><span class="text-light">set_attrib</span>(<span class="textsuccess">'method'</span>, <span class="text-success">'POST'</span>);

<span class="text-primary">// Input: (type, name, value, class)</span>
<span class="text-warning">$input</span> = <span class="text-info">new</span> \k1lib\html\input(<span class="textsuccess">'text'</span>, <span class="text-success">'username'</span>, <span class="text-success">''</span>);

<span class="text-primary">// Label: (text, for, class)</span>
<span class="text-warning">$label</span> = <span class="text-info">new</span> \k1lib\html\label(<span class="textsuccess">'Username'</span>, <span class="textsuccess">''</span>, <span class="textsuccess">'form-label'</span>);

<span class="text-primary">// Fieldset: (legend)</span>
<span class="text-warning">$fieldset</span> = <span class="text-info">new</span> \k1lib\html\fieldset(<span class="textsuccess">'Login'</span>);

<span class="text-warning">echo</span> <span class="textwarning">$form</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>