<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <legend> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class legend extends tag {

    use append_shortcuts;

    /**
     * @param string $value
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value, $class = NULL, $id = NULL) {
        parent::__construct("legend", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
