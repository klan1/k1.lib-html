<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <legend> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class legend extends tag {

    use append_shotcuts;

    /**
     * @param string $value
     */
    function __construct($value) {
        parent::__construct("legend", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
    }
}
