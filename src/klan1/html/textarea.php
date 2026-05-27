<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <textarea> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class textarea extends tag {

    use append_shortcuts;

    /**
     * Create a textarea element
     *
     * @param string $name The name attribute
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($name, $class = NULL, $id = NULL) {
        parent::__construct("textarea", IS_NOT_SELF_CLOSED);
        $this->set_attrib("name", $name);
        $this->set_class($class, TRUE);
        $this->set_id($id);
        $this->set_attrib("rows", 10);
    }
}
