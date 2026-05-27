<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <i> italic text element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class i extends tag {

    use append_shortcuts;

    /**
     * Create an italic text element
     *
     * @param string|null $value The text content
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($value = NULL, $class = NULL, $id = NULL) {
        parent::__construct("i", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class);
        $this->set_id($id);
    }
}
