<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <script> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class script extends tag {

    use append_shortcuts;

    /**
     * Create a script element
     *
     * @param string|null $src The src attribute
     */
    function __construct($src = NULL) {
        parent::__construct("script", IS_NOT_SELF_CLOSED);
        if (!empty($src)) {
            $this->set_attrib("src", $src);
        }
    }
}
