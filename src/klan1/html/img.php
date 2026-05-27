<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <img> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class img extends tag {

    use append_shortcuts;

    /**
     * @param string|null $src
     * @param string $alt
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($src = NULL, $alt = "Image", $class = NULL, $id = NULL) {
        parent::__construct("img", IS_SELF_CLOSED);
        $this->set_attrib("src", $src);
        $this->set_attrib("alt", $alt);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    function set_value($value, $append = FALSE): tag {
        $this->set_attrib("alt", $value, $append);
        return $this;
    }

    function set_src(string $src): tag {
        $this->set_attrib("src", $src);
        return $this;
    }

    function get_src(): string|false {
        return $this->get_attribute("src");
    }

    function set_alt(string $alt_text, $append = FALSE): tag {
        $this->set_attrib("alt", $alt_text, $append);
        return $this;
    }
}
