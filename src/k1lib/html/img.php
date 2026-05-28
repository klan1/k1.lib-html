<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <img> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class img extends tag {

    use append_shortcuts;

    /**
     * Create an img element
     *
     * @param string|null $src The src attribute
     * @param string $alt The alt attribute
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($src = NULL, $alt = "Image", $class = NULL, $id = NULL) {
        parent::__construct("img", IS_SELF_CLOSED);
        $this->set_attrib("src", $src);
        $this->set_attrib("alt", $alt);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Set the alt attribute (overrides parent set_value)
     *
     * @param string $value The alt text value
     * @param bool $append If true, append to existing value
     * @return tag The current tag for chaining
     */
    function set_value($value, $append = FALSE): tag {
        $this->set_attrib("alt", $value, $append);
        return $this;
    }

    /**
     * Set the src attribute
     *
     * @param string $src The src value
     * @return tag The current tag for chaining
     */
    function set_src(string $src): tag {
        $this->set_attrib("src", $src);
        return $this;
    }

    /**
     * Get the src attribute value
     *
     * @return string|false The src value or false if not set
     */
    function get_src(): string|false {
        return $this->get_attribute("src");
    }

    /**
     * Set the alt attribute
     *
     * @param string $alt_text The alt text value
     * @param bool $append If true, append to existing value
     * @return tag The current tag for chaining
     */
    function set_alt(string $alt_text, $append = FALSE): tag {
        $this->set_attrib("alt", $alt_text, $append);
        return $this;
    }
}
