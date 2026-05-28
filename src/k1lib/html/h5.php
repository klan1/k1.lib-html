<?php

namespace k1lib\html;

/**
 * HTML <h5> heading element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class h5 extends tag {

    use append_shortcuts;

    /**
     * Create an h5 heading element
     *
     * @param string|null $value The heading text content
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($value = NULL, $class = NULL, $id = NULL) {
        parent::__construct("h5", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class);
        $this->set_id($id);
    }
}
