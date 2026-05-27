<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <span> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class span extends tag {

    use append_shortcuts;

    /**
     * Create a span element
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("span", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
