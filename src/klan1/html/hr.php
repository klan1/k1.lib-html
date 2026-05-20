<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <hr> horizontal rule element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class hr extends tag {

    /**
     */
    function __construct() {
        parent::__construct("hr", IS_SELF_CLOSED);
    }
}
