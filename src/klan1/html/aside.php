<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <aside> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class aside extends tag {

    use append_shotcuts;

    /**
     * Create an ASIDE html tag with VALUE as data.
     *
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("aside", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
