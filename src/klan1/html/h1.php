<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <h1> heading element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class h1 extends tag {

    use append_shotcuts;

    /**
     * @param string|null $value
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value = NULL, $class = NULL, $id = NULL) {
        parent::__construct("h1", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class);
        $this->set_id($id);
    }
}
