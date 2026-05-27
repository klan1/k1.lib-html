<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <meta> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class meta extends tag {

    use append_shortcuts;

    /**
     * Create a meta element
     *
     * @param string|null $name The name attribute
     * @param string|null $content The content attribute
     */
    function __construct($name = NULL, $content = NULL) {
        parent::__construct("meta", IS_SELF_CLOSED);
        if (!empty($name)) {
            $this->set_attrib("name", $name);
        }
        if (!empty($content)) {
            $this->set_attrib("content", $content);
        }
    }
}
