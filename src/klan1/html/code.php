<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <code> inline code element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class code extends tag {

    use append_shotcuts;

    /**
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("code", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
