<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <body> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class body extends tag {

    use append_shotcuts;

    function __construct() {
        parent::__construct("body", IS_NOT_SELF_CLOSED);
    }
}
