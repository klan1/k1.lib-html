<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <tbody> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class tbody extends tag {

    use append_shortcuts;

    /**
     * Create a tbody element
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("tbody", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Append a tr element to the tbody
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     * @return tr The appended tr element
     */
    function append_tr($class = NULL, $id = NULL): tr {
        $child_object = new tr($class, $id);
        $this->append_child($child_object);
        return $child_object;
    }
}
