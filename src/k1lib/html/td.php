<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <td> table data cell element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class td extends tag {

    use append_shortcuts;

    /**
     * Create a td element
     *
     * @param string $value The cell text content
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($value, $class = NULL, $id = NULL) {
        parent::__construct("td", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
