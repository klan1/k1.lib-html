<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <input> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class input extends tag {

    use append_shortcuts;

    /**
     * Create an input element
     *
     * @param string $type The input type (text, button, submit, etc.)
     * @param string $name The name attribute
     * @param string $value The value attribute
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($type, $name, $value, $class = NULL, $id = NULL) {
        parent::__construct("input", IS_SELF_CLOSED);
        $this->set_attrib("type", $type);
        $this->set_attrib("name", $name);
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
