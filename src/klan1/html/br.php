<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <br> line break element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class br extends tag {

    /**
     */
    function __construct() {
        parent::__construct("br", IS_SELF_CLOSED);
    }
}
