<?php

namespace k1lib\html;

class ol extends tag {

    use append_shortcuts;

    /**
     * Create a OL html tag.
     *
     * @param string|null $class
     * @param string|null $id
     * @return void
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("ol", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}