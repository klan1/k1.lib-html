<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <th> table header cell element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class th extends tag {

    use append_shortcuts;

    /**
     * Create a th element
     *
     * @param string $value The header cell text content
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($value, $class = NULL, $id = NULL) {
        parent::__construct("th", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
