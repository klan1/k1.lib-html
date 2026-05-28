<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <option> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class option extends tag {

    use append_shortcuts;

    /**
     * Create an option element
     *
     * @param string $value The value attribute
     * @param string $label The text content
     * @param bool $selected Whether the option is selected
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($value, $label, $selected = FALSE, $class = NULL, $id = NULL) {
        parent::__construct("option", IS_NOT_SELF_CLOSED);
        $this->set_value($label);
        $this->set_attrib("value", $value);
        if ($selected) {
            $this->set_attrib("selected", $selected);
        }
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
