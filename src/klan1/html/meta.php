<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <meta> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class meta extends tag {

    use append_shotcuts;

    /**
     * @param string|null $name
     * @param string|null $content
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
