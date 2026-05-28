<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <select> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class select extends tag {

    use append_shortcuts;

    /**
     * Create a select element
     *
     * @param string $name The name attribute
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     */
    function __construct($name, $class = NULL, $id = NULL) {
        parent::__construct("select", IS_NOT_SELF_CLOSED);
        $this->set_attrib("name", $name);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Append an option element to the select
     *
     * @param string $value The value attribute
     * @param string $label The text content
     * @param bool $selected Whether the option is selected
     * @param string|null $class The class attribute
     * @param string|null $id The id attribute
     * @return option The appended option element
     */
    function append_option($value, $label, $selected = FALSE, $class = NULL, $id = NULL): option {
        $child_object = new option($value, $label, $selected, $class, $id);
        $this->append_child($child_object);
        return $child_object;
    }

    /**
     * Set the selected value of the select
     *
     * @param string $value The value to select
     * @param bool $append If true, append to existing value
     * @return tag The current tag for chaining
     */
    function set_value($value, $append = FALSE): tag {
        $selected = $this->get_elements_by_attrib("selected");
        if (!empty($selected)) {
            $selected[0]->remove_attrib("selected");
        }
        $target_tag = $this->get_elements_by_attrib_value("value", $value);
        if (isset($target_tag[0])) {
            $target_tag[0]->set_attrib("selected", TRUE);
        }
        return $this;
    }
}
