<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <link> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class link extends tag {

    use append_shotcuts;

    /**
     * @param string|null $href
     * @param string $rel
     * @param string $type
     */
    public function __construct($href, $rel = 'stylesheet', $type = 'text/css') {
        parent::__construct("link", IS_SELF_CLOSED);
        if (!empty($href)) {
            $this->set_attrib("rel", $rel);
            if (strtolower(substr($href, -4)) == '.css') {
                $this->set_attrib("type", "text/css");
            } else {
                $this->set_attrib("type", $type);
            }
            $this->set_attrib("href", $href);
        }
    }

    public function set_value($value, $append = FALSE) {
        $this->set_attrib("href", $value);
        return $this;
    }
}
