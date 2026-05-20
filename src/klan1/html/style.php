<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <style> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class style extends tag {

    use append_shotcuts;

    /**
     * Create a STYLE html tag with VALUE as data. Use $style->set_value($css) for load a file.
     *
     * @param string|null $style
     */
    function __construct($style = NULL) {
        parent::__construct("style", IS_NOT_SELF_CLOSED);
        if (!empty($style)) {
            $this->set_value($style);
        }
    }
}
