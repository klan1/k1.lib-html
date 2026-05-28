<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <label> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class label extends tag {

    use append_shortcuts;

    /**
     * Create a label element
     *
     * @param string $label The label text content
     * @param string|null $for The for attribute (id of associated element)
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($label, $for, $class = NULL, $id = NULL) {
        parent::__construct("label", IS_NOT_SELF_CLOSED);
        $this->set_value($label);
        if (!empty($for)) {
            $this->set_attrib("for", $for);
        }
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
