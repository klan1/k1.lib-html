<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <form> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class form extends tag {

    use append_shortcuts;

    /**
     * Create a form element
     *
     * @param string $id The form id attribute
     */
    function __construct($id = "k1lib-form") {
        parent::__construct("form", IS_NOT_SELF_CLOSED);
        $this->set_id($id);
        $this->set_attrib("name", "k1lib-form");
        $this->set_attrib("method", "post");
        $this->set_attrib("autocomplete", "on");
        $this->set_attrib("enctype", "multipart/form-data");
        $this->set_attrib("novalidate", FALSE);
        $this->set_attrib("target", "_self");
    }

    /**
     * Append a submit button to the form
     *
     * @param string $label The button label text
     * @param string $input_name The input name attribute
     * @param bool $just_return If true, only return the input without appending
     * @return input The submit button element
     */
    function append_submit_button($label = "Enviar", $input_name = 'submit-it', $just_return = FALSE): input {
        $submit_button = new input("submit", $input_name, $label,
                "btn icon btn-outline-success btn-sm");

        if (!$just_return) {
            $this->append_child($submit_button);
        }
        return $submit_button;
    }
}
