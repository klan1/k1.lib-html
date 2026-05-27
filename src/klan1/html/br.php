<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <br> line break element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class br extends tag {

    /**
     * Create a line break element
     */
    function __construct() {
        parent::__construct("br", IS_SELF_CLOSED);
    }
}
