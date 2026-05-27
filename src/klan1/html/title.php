<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <title> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class title extends tag {

    use append_shortcuts;

    /**
     * Create a title element
     */
    function __construct() {
        parent::__construct("title", IS_NOT_SELF_CLOSED);
    }
}
