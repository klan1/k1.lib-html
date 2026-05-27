<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <a> anchor element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class a extends tag {

    use append_shortcuts;

    /**
     * Create an anchor element
     *
     * @param string $href The href attribute
     * @param string $label The anchor text content
     * @param string|null $target The target attribute
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($href, $label, $target = NULL, $class = NULL, $id = NULL) {
        parent::__construct("a", IS_NOT_SELF_CLOSED);
        if (!empty($href)) {
            $this->set_attrib("href", $href);
        }
        if (!empty($label)) {
            $this->set_value($label);
        }
        if (!empty($target)) {
            $this->set_attrib("target", $target);
        }
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Set the href attribute
     *
     * @param string $href The href value
     * @return tag The current tag for chaining
     */
    function set_href(string $href): tag {
        $this->set_attrib("href", $href);
        return $this;
    }

    /**
     * Get the href attribute value
     *
     * @return string|false The href value or false if not set
     */
    function get_href(): string|false {
        return $this->get_attribute("href");
    }
}
