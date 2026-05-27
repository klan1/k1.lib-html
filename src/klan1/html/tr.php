<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <tr> table row element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class tr extends tag {

    use append_shortcuts;

    /**
     * Create a tr element
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("tr", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Append a th element to the tr
     *
     * @param string $value The header cell text content
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     * @return th The appended th element
     */
    function append_th($value, $class = NULL, $id = NULL): th {
        $child_object = new th($value, $class, $id);
        $this->append_child($child_object);
        return $child_object;
    }

    /**
     * Append a td element to the tr
     *
     * @param string $value The cell text content
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     * @return td The appended td element
     */
    function append_td($value, $class = NULL, $id = NULL): td {
        $child_object = new td($value, $class, $id);
        $this->append_child($child_object);
        return $child_object;
    }
}
