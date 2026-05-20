<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <ul> unordered list element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class ul extends tag {

    use append_shotcuts;

    /**
     * Create a UL html tag.
     *
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("ul", IS_NOT_SELF_CLOSED);
//        $this->data_array &= $data_array;
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
