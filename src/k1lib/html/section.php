<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <section> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class section extends tag {

    use append_shortcuts;

    /**
     * Create a section element
     *
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("section", IS_NOT_SELF_CLOSED);
        if (!empty($class)) {
            $this->set_attrib("class", $class);
        }
        if (!empty($id)) {
            $this->set_attrib("id", $id);
        }
    }
}
