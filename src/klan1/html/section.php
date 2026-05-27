<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <section> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class section extends tag {

    use append_shortcuts;

    /**
     * @param string|null $class
     * @param string|null $id
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
