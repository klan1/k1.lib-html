<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <article> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class article extends tag {

    use append_shotcuts;

    /**
     * Create an ARTICLE html tag with VALUE as data.
     *
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("article", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
