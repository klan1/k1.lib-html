<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <button> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class button extends tag {

    use append_shortcuts;

    /**
     * Create a button element
     *
     * @param string|null $value The button text content
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     * @param string $type The button type attribute
     */
    function __construct($value = NULL, $class = NULL, $id = NULL, $type = "button") {
        parent::__construct("button", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class);
        $this->set_id($id);
        if (!empty($type)) {
            $this->set_attrib("type", $type);
        }
    }
}
