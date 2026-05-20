<?php

/**
 * @author Alejandro Trujillo J. <https://klan1.com>
 */

namespace k1lib\html;

/**
 * HTML <strong> element
 *
 * @author Alejandro Trujillo J. <https://klan1.com>
 */
class strong extends tag {

    use append_shotcuts;

    /**
     * Create a STRONG html tag with VALUE as data. Use $strong->set_value($data)
     *
     * @param string $value
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value = '', $class = NULL, $id = NULL) {
        parent::__construct("strong", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
