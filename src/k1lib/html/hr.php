<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <hr> horizontal rule element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class hr extends tag {

    /**
     * Create a horizontal rule element
     */
    function __construct() {
        parent::__construct("hr", IS_SELF_CLOSED);
    }
}
