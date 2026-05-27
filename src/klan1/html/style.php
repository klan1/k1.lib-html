<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <style> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class style extends tag {

    use append_shortcuts;

    /**
     * Create a style element
     *
     * @param string|null $style The CSS content
     */
    function __construct($style = NULL) {
        parent::__construct("style", IS_NOT_SELF_CLOSED);
        if (!empty($style)) {
            $this->set_value($style);
        }
    }
}
