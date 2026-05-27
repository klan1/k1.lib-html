<?php

namespace k1lib\html;

class ul extends tag {

    use append_shortcuts;

    /**
     * Create a UL html tag.
     *
     * @param string|null $class
     * @param string|null $id
     * @return void
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("ul", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}