<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <table> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class table extends tag {

    use append_shortcuts;

    /**
     * Create a table element
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("table", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Append a thead element to the table
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     * @return thead The appended thead element
     */
    function append_thead($class = NULL, $id = NULL): thead {
        $child_object = new thead($class, $id);
        $this->append_child($child_object);
        return $child_object;
    }

    /**
     * Append a tbody element to the table
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     * @return tbody The appended tbody element
     */
    function append_tbody($class = NULL, $id = NULL): tbody {
        $child_object = new tbody($class, $id);
        $this->append_child($child_object);
        return $child_object;
    }
}
