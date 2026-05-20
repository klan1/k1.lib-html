<?php

namespace k1lib\html;

/**
 * HTML <h5> heading element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class h5 extends tag {

    use append_shotcuts;

    function __construct($value = NULL, $class = NULL, $id = NULL) {
        parent::__construct("h5", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class);
        $this->set_id($id);
    }
}
