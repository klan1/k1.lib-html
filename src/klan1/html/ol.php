<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <ol> ordered list element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class ol extends tag {

    use append_shortcuts;

    /**
     * Create a OL html tag.
     *
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("ol", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    function set_value($value, $append = FALSE) {
//            parent::set_value($value, $append);
    }

    /**
     * 
     * @param string $class
     * @param string $id
     * @return li
     */
    function append_li($value = NULL, $class = NULL, $id = NULL) {
        $new = new li($value, $class, $id);
        $this->append_child($new);
        return $new;
    }
}
