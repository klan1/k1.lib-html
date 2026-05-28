<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <nav> navigation element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class nav extends tag {

    use append_shortcuts;

    /**
     * Create a nav element
     *
     * @param string|null $value The aria-label attribute value
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($value = NULL, $class = NULL, $id = NULL) {
        parent::__construct("nav", IS_NOT_SELF_CLOSED);
        $this->set_attrib('aria-label', $value);
        $this->set_class($class);
        $this->set_id($id);
    }
}
