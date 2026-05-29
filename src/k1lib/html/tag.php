<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

const IS_SELF_CLOSED = TRUE;
const IS_NOT_SELF_CLOSED = FALSE;
const NO_CLASS = NULL;
const NO_ID = NULL;
const NO_VALUE = NULL;
const APPEND_ON_HEAD = 1;
const APPEND_ON_MAIN = 2;
const APPEND_ON_TAIL = 3;
const INSERT_ON_PRE_TAG = -1;
const INSERT_ON_AFTER_TAG_OPEN = 2;
const INSERT_ON_VALUE = 0;
const INSERT_ON_BEFORE_TAG_CLOSE = 3;
const INSERT_ON_POST_TAG = 1;

/**
 * HTML Tag abstraction
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */
class tag {

    use append_shortcuts;

    /** @var tag|null Reference to the root document tag */
    static tag|null $root = null;

    /** @var bool */
    static protected $use_log = FALSE;

    /** @var bool */
    static protected $debug_tag = false;

    /** @var string */
    protected $tag_id = 0;

    /** @var string */
    protected $tag_name = NULL;

    /** @var bool */
    protected $is_self_closed = FALSE;

    /** @var bool */
    protected $is_inline = FALSE;

    /** @var bool */
    protected $inside_inline = FALSE;

    /** @var array */
    protected $attributes = array();

    /** @var string */
    protected $attributes_code = "";

    /** @var string */
    protected $tag_code = "";

    /** @var string */
    protected $pre_code = "";

    /** @var string */
    protected $post_code = "";

    /** @var string */
    protected $value = "";

    /** @var string */
    protected $post_value = "";

    /** @var string */
    protected $pre_value = "";

    /** @var bool */
    protected $has_children = FALSE;

    /** @var array */
    protected $children_head = array();

    /** @var tag[] */
    protected $children = array();

    /** @var array */
    protected $children_tail = array();

    /** @var int */
    protected $child_level = 0;

    /** @var tag */
    protected tag|null $parent = NULL;

    /** @var tag; */
    protected $this_link = NULL;

    static function debug(bool|null $mode): bool {
        if ($mode !== null) {
            self::$debug_tag = $mode;
        }
        return self::$debug_tag;
    }

    /**
     * Constructor with $tag_name and $self_closed options for beginning
     *
     * @param string $tag_name The HTML tag name (e.g., "div", "span")
     * @param bool $self_closed Is self closed as <tag /> or tag closed one <tag></tag>
     */
    function __construct($tag_name, $self_closed = IS_SELF_CLOSED) {

        if (!empty($tag_name) && is_string($tag_name)) {
            $this->tag_name = $tag_name;
        } else {
            trigger_error("TAG has to be string", E_USER_WARNING);
        }

        if (is_bool($self_closed)) {
            $this->is_self_closed = $self_closed;
        } else {
            trigger_error("Self closed value has to be boolean", E_USER_WARNING);
        }
        // GET the global tag ID and catalog the object
        $this->tag_id = tag_catalog::increase($this);
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} was created");
        }
    }

    /**
     * Clone handler - catalogs the cloned tag
     */
    function __clone() {
        $this->tag_id = tag_catalog::increase($this);
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} was cloned");
        }
    }

    /**
     * Get the root document tag
     *
     * @return tag|null The root document tag
     */
    function document(): tag|null {
        return self::$root;
    }

    /**
     * Remove the tag Object from the Array catalog, this will disable the
     * Object to be found or generated on chain actions.
     *
     * IMPORTANT: When a tag is decataloged, it won't be included in chain operations
     * like append_child(), generate(), or search operations (q(), get_element_by_id(), etc.).
     * This is useful for conditionally removing tags from the document flow or
     * preventing unwanted nested generation.
     *
     * @return void
     * @package k1lib\html
     */
    function decatalog(): void {
        // Itself from Catalog
        tag_catalog::decatalog($this->tag_id);
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} was decataloged");
        }
        // His children
        if ($this->has_children) {
            foreach ($this->children as $child_object) {
                $child_object->decatalog();
            }
        }
        // Children head
        foreach ($this->children_head as $child_object) {
            $child_object->decatalog();
        }
        // Children tail
        foreach ($this->children_tail as $child_object) {
            $child_object->decatalog();
        }
        // Inline objects
        foreach ($this->get_inline_tags() as $tag) {
            $tag->decatalog();
        }
    }

    /**
     * Check if this tag is currently cataloged
     *
     * @return bool True if cataloged, false otherwise
     */
    function is_cataloged(): bool {
        return tag_catalog::is_cataloged($this->tag_id);
    }

    /**
     * Get the catalog index (an unique id) for this tag Object or NULL if the
     * Object has been decataloged
     *
     * @return int|null The tag catalog index or null if decataloged
     */
    function get_tag_id(): int|null {
        if (tag_catalog::index_exist($this->tag_id)) {
            return $this->tag_id;
        } else {
            return NULL;
        }
    }

    /**
     * Whatever or not EVERY tag Object created will use the log system
     *
     * @return bool
     */
    static function get_use_log(): bool {
        return self::$use_log;
    }

    /**
     * Set whether tags should use the log system
     *
     * @param bool $use_log Whether to enable logging
     * @return void
     */
    static function set_use_log(bool $use_log): void {
        self::$use_log = $use_log;
    }

    /**
     * Return the parent tag Object.
     *
     * @return tag|null The parent tag or null if no parent
     */
    function get_parent(): tag|null {
        return $this->parent;
    }

    /**
     * Chains the parent tag Object
     *
     * @param tag $parent The parent tag to set
     * @return tag The current tag for chaining
     */
    function set_parent(tag $parent): tag {
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is child of [{$parent->get_tag_name()}] ID:{$parent->tag_id} ");
        }
        $this->parent = $parent;
        return $this;
    }

    /**
     * When the tag Object is used as string, maybe as inline on text it
     * will be returned as {{ID:1..}} to converted when the container Object is
     * generated
     *
     * @return string
     */
    public function __toString(): string {
        if ($this->get_tag_id()) {
            if (html_document::get_use_log()) {
                tag_log::log("[{$this->get_tag_name()}] is returned for inline use");
            }
            return "{{ID:" . $this->get_tag_id() . "}}";
        } else {
            return "";
        }
    }

    /**
     * Chains an HTML tag into the actual HTML tag on MAIN collection, by default will put on last
     * position but with $put_last_position = FALSE will be the on first position
     *
     * @param tag $child_object The tag to append as child
     * @param bool $put_last_position If true, append at last position; if false, prepend at first
     * @param int $tag_position Position constant: APPEND_ON_HEAD, APPEND_ON_MAIN, or APPEND_ON_TAIL
     * @return tag The appended child tag
     */
    public function append_child(tag $child_object, $put_last_position = TRUE, $tag_position = APPEND_ON_MAIN): tag {
        $child_object->set_parent($this);
        if ($put_last_position) {
            switch ($tag_position) {
                case APPEND_ON_HEAD:
                    $this->children_head[] = $child_object;
                    break;
                case APPEND_ON_TAIL:
                    $this->children_tail[] = $child_object;
                    break;
                default:
                    $this->children[] = $child_object;
                    break;
            }
        } else {
            switch ($tag_position) {
                case APPEND_ON_HEAD:
                    array_unshift($this->children_head, $child_object);
                    break;
                case APPEND_ON_TAIL:
                    array_unshift($this->children_tail, $child_object);
                    break;
                default:
                    array_unshift($this->children, $child_object);
                    break;
            }
        }
        $this->has_children = TRUE;
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} appends [{$child_object->get_tag_name()}] ID:{$child_object->tag_id} ");
        }
        return $child_object;
    }

    /**
     * Chains an HTML tag into the actual HTML tag on HEAD collection, by default will put on last
     * position but with $put_last_position = FALSE will be the on first position
     *
     * @param tag $child_object The tag to append as child
     * @param bool $put_last_position If true, append at last position; if false, prepend at first
     * @return tag The appended child tag
     */
    public function append_child_head(tag $child_object, $put_last_position = TRUE): tag {
        $child_object->set_parent($this);
        $this->append_child($child_object, $put_last_position, APPEND_ON_HEAD);
        return $child_object;
    }

    /**
     * Chains an HTML tag into the actual HTML tag on TAIL collection, by default will put on last
     * position but with $put_last_position = FALSE will be the on first position
     *
     * @param tag $child_object The tag to append as child
     * @param bool $put_last_position If true, append at last position; if false, prepend at first
     * @return tag The appended child tag
     */
    public function append_child_tail(tag $child_object, $put_last_position = TRUE): tag {
        $child_object->set_parent($this);
        $this->append_child($child_object, $put_last_position, APPEND_ON_TAIL);
        return $child_object;
    }

    /**
     * Chains THIS HTML tag to a another HTML tag
     *
     * @param tag $html_object The parent HTML object to append to
     * @return tag The current tag for chaining
     */
    public function append_to(tag $html_object): tag {
        $this->set_parent($html_object);
        $html_object->append_child($this);
        return $this;
    }

    /**
     * Removes all child tags from this tag
     *
     * @return tag The current tag for chaining
     */
    public function remove_childs(): tag {
        foreach ($this->children as $key => $child) {
            unset($this->children[$key]);
            $child->decatalog();
        }
        foreach ($this->children_head as $key => $child) {
            unset($this->children_head[$key]);
            $child->decatalog();
        }
        foreach ($this->children_tail as $key => $child) {
            unset($this->children_tail[$key]);
            $child->decatalog();
        }
        $this->has_children = FALSE;
        return $this;
    }

    /**
     * Add free TEXT before the generated TAG
     *
     * @param string $pre_code The code to prepend
     * @return void
     */
    function pre_code($pre_code): void {
        if (substr($pre_code, 0, 1) != "\n") {
            $pre_code = "\n" . $pre_code;
        }
        if (substr($pre_code, -1) != "\n") {
            $pre_code = $pre_code . "\n";
        }
        $this->pre_code = $pre_code;
    }

    /**
     * Add free TEXT after the generated TAG
     *
     * @param string $post_code The code to append after
     * @return void
     */
    function post_code($post_code): void {
        if (substr($post_code, 0, 1) != "\n") {
            $post_code = "\n" . $post_code;
        }
        if (substr($post_code, -1) != "\n") {
            $post_code = $post_code . "\n";
        }
        $this->post_code = $post_code;
    }

    /**
     * Add free TEXT before the generated TAG
     *
     * @param string $pre_value The value to prepend
     * @return void
     */
    function pre_value($pre_value): void {
        if (substr($pre_value, 0, 1) != "\n") {
            $pre_value = "\n" . $pre_value;
        }
        if (substr($pre_value, -1) != "\n") {
            $pre_value = $pre_value . "\n";
        }
        $this->pre_value = $pre_value;
    }

    /**
     * Add free TEXT after the generated TAG
     *
     * @param string $post_value The value to append after
     * @return void
     */
    function post_value($post_value): void {
        if (substr($post_value, 0, 1) != "\n") {
            $post_value = "\n" . $post_value;
        }
        if (substr($post_value, -1) != "\n") {
            $post_value = $post_value . "\n";
        }
        $this->post_value = $post_value;
    }

    /**
     * Load content from a file and insert it at a specified position
     *
     * @param string $file_path Path to the file to load
     * @param int $position Position constant for where to insert: INSERT_ON_PRE_TAG, INSERT_ON_AFTER_TAG_OPEN, INSERT_ON_VALUE, INSERT_ON_BEFORE_TAG_CLOSE, or INSERT_ON_POST_TAG
     * @param bool $include_file If true, use include; if false, use file_get_contents
     * @param bool $append If true, append to existing value; if false, replace
     * @return bool True on success, false on failure
     */
    function load_file($file_path, $position = INSERT_ON_VALUE, $include_file = TRUE, $append = TRUE): bool {
        if (file_exists($file_path)) {
            if ($include_file) {
                ob_start();
                include $file_path;
                $file_content = ob_get_clean();
            } else {
                $file_content = file_get_contents($file_path);
            }
            if (!empty($file_content)) {
                switch ($position) {
                    case INSERT_ON_PRE_TAG:
                        $this->pre_code($this->pre_code . $file_content);
                        break;
                    case INSERT_ON_AFTER_TAG_OPEN:
                        $this->pre_value($this->pre_value . $file_content);
                        break;
                    case INSERT_ON_VALUE:
                        if (substr($file_content, 0, 1) != "\n") {
                            $file_content = "\n" . $file_content;
                        }
                        if (substr($file_content, -1) != "\n") {
                            $file_content = $file_content . "\n";
                        }
                        $this->set_value($file_content, $append);
                        break;
                    case INSERT_ON_BEFORE_TAG_CLOSE:
                        $this->post_value($this->post_value . $file_content);
                        break;
                    case INSERT_ON_POST_TAG:
                        $this->post_code($this->post_code . $file_content);
                        break;
                    default:
                        break;
                }
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            user_error("the file '$file_path' do not exist", E_USER_WARNING);
            return FALSE;
        }
    }

    /**
     * Set the VALUE for the TAG, as <TAG value="$value" /> or <TAG>$value</TAG>
     *
     * @param string $value The value to set
     * @param bool $append If true, append to existing value; if false, replace
     * @return tag The current tag for chaining
     */
    public function set_value($value, $append = FALSE): tag {

        if (empty($this->this_link)) {
            if (($value !== FALSE) && ($value !== NULL)) {
                $this->value = ($append === TRUE) ? ($this->value . " " . $value) : ("$value");
            }
        } else {
            $this->this_link->set_value((($append === TRUE) && (!empty($this->this_link->get_value()))) ? ($this->this_link->get_value() . " " . $value) : ("$value"));
        }
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} set value to: {$value}");
        }
        return $this;
    }

    /**
     * Links the value of the current object to a child one. The current WON't be used and the value will be placed on the link object.
     *
     * @param tag $obj_to_link The tag object to link values to
     * @return void
     */
    public function link_value_obj(tag $obj_to_link): void {
        $this->this_link = $obj_to_link;
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is linked to [{$obj_to_link->get_tag_name()}]");
        }
    }

    /**
     * Unlinks the value object
     *
     * @return void
     */
    public function unlink_value_obj(): void {
        $this->this_link = NULL;
    }

    /**
     * Return the reference for chained HTML tag object
     *
     * @param int $n Index beginning from 0
     * @return tag|false Returns FALSE if is not set
     */
    public function get_child($n): tag|false {
        if (isset($this->children[$n])) {
            return $this->children[$n];
        } else {
            return FALSE;
        }
    }

    /**
     * Return array of reference for chained HTML tags objects
     *
     * @return tag[] Returns array of child tags
     */
    public function get_childs(): array {
        if (!empty($this->children)) {
            return $this->children;
        } else {
            return [];
        }
    }

    /**
     * Replace current child reference with another one
     *
     * @param int $n The index of the child to replace
     * @param tag $new_object The new tag object to replace with
     * @return void
     */
    public function replace_child($n, tag $new_object): void {
        if (array_key_exists($n, $this->children)) {
            $this->children[$n] = $new_object;
        }
    }

    /**
     * Set an attribute with its value always overwriting if $append is not set TRUE to append old value with the recieved one.
     *
     * @param string $attribute The attribute name
     * @param string $value The attribute value
     * @param bool $append If true, append to existing value; if false, replace
     * @return tag The current tag for chaining
     */
    public function set_attrib($attribute, $value, $append = FALSE): tag {
        if (!empty($attribute) && is_string($attribute)) {
            if (empty($this->this_link)) {
                if ($value !== NULL) {
                    if (($append === TRUE) && (!empty($this->attributes[$attribute]))) {
                        $this->attributes[$attribute] = $this->attributes[$attribute] . " " . $value;
                    } else {
                        $this->attributes[$attribute] = $value;
                    }
                }
            } else {
                $this->this_link->set_attrib($attribute, $value, $append);
            }
        } else {
            trigger_error("HTML ATTRIBUTE has to be string", E_USER_WARNING);
        }
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} new attrib: {$attribute}={$value}");
        }
        return $this;
    }

    /**
     * Remove an attribute from the tag
     *
     * @param string $attribute The attribute name to remove
     * @return void
     */
    public function remove_attrib($attribute): void {
        if (isset($this->attributes[$attribute])) {
            unset($this->attributes[$attribute]);
        }
    }

    /**
     * Remove specific text from an attribute value
     *
     * @param string $attribute The attribute name
     * @param string $text The text to remove from the attribute value
     * @return string The modified tag_attribute_value
     */
    public function remove_attribute_text($attribute, $text): string {
        $attribute_value = $this->get_attribute($attribute);
        $text_regexp = "/(\s*$text\s*)/";
        $regexp_match = [];
        if (preg_match($text_regexp, $attribute_value, $regexp_match)) {
            $string_new = str_replace($regexp_match[1], "", $attribute_value);
            $this->set_attrib($attribute, $string_new);
            return $string_new;
        } else {
            return $attribute_value;
        }
    }

    /**
     * Shortcut for $html->set_attrib("id",$id);
     *
     * @param string $id The id value to set
     * @param bool $append If true, append to existing value; if false, replace
     * @return tag The current tag for chaining
     */
    public function set_id($id, $append = FALSE): tag {
        if (!empty($id)) {
            $this->set_attrib("id", $id, $append);
        }
        return $this;
    }

    /**
     * Shortcut for $html->set_attrib("class",$class);
     *
     * @param string $class The class value to set
     * @param bool $append If true, append to existing value; if false, replace
     * @return tag The current tag for chaining
     */
    public function set_class($class, $append = FALSE): tag {
        if (!empty($class)) {
            $this->set_attrib("class", $class, $append);
        }
        return $this;
    }

    /**
     * Shortcut for $html->set_attrib("style",$style);
     *
     * @param string $style The style value to set
     * @param bool $append If true, append to existing value; if false, replace
     * @return tag The current tag for chaining
     */
    public function set_style($style, $append = FALSE): tag {
        if (!empty($style)) {
            $this->set_attrib("style", $style, $append);
        }
        return $this;
    }

    /**
     * If the attribute was set returns its value
     *
     * @param string $attribute The attribute name
     * @return string|false Returns attribute value or FALSE if not set
     */
    public function get_attribute($attribute): string|false {
        if (isset($this->attributes[$attribute])) {
            return $this->attributes[$attribute];
        } else {
            return FALSE;
        }
    }

    /**
     * Get all attributes as an array
     *
     * @return array All attributes as key-value pairs
     */
    public function get_attributes_array(): array {
        return $this->attributes;
    }

    /**
     * Gets the VALUE for the TAG, as <TAG value="$value" /> or <TAG>$value</TAG>
     *
     * @param int $current_child_level The current child level for inline tag generation
     * @return string The tag value
     */
    public function get_value($current_child_level = 0): string {
        if (is_object($this->value)) {
            trigger_error("This shouldn't be used more", E_USER_NOTICE);
            return $this->get_value();
        } else {
            $this->parse_value($current_child_level);
            return $this->value;
        }
    }

    /**
     * Generate inline tag Objects on the value property
     *
     * @param int $current_child_level The current child level
     * @return void
     */
    public function parse_value($current_child_level = 0): void {
        $value_original = $this->value;
        foreach ($this->get_inline_ids() as $tag_id) {
            if (tag_catalog::index_exist($tag_id)) {
                $tag_string = "{{ID:" . $tag_id . "}}";
                tag_catalog::get_by_index($tag_id)->child_level = $current_child_level + 1;
                tag_catalog::get_by_index($tag_id)->is_inline = TRUE;
                $this->value = str_replace($tag_string, tag_catalog::get_by_index($tag_id)->generate(), $this->value);
            }
        }
        if ($value_original !== $this->value) {
            $this->has_children = TRUE;
        }
    }

    /**
     * Returns an Array with the ID list found on $this->value
     *
     * @return int[] Array of tag IDs found in the value
     */
    public function get_inline_ids(): array {
        $regexp = "/\{\{ID:(\d*)\}\}/";
        $matches = [];
        $cataloged = [];
        if (preg_match_all($regexp, $this->value, $matches)) {
            foreach ($matches[1] as $tag_id) {
                if (tag_catalog::index_exist($tag_id)) {
                    $cataloged[] = $tag_id;
                }
            }
        }
        return $cataloged;
    }

    /**
     * Returns an Array with the tag Objects found on $this->value
     *
     * @return tag[] Array of tag objects found in the value
     */
    public function get_inline_tags(): array {
        $regexp = "/\{\{ID:(\d*)\}\}/";
        $matches = [];
        $tags = [];
        if (preg_match_all($regexp, $this->value, $matches)) {
            foreach ($matches[1] as $tag_id) {
                if (tag_catalog::index_exist($tag_id)) {
                    $tags[] = tag_catalog::get_by_index($tag_id);
                }
            }
        }
        return $tags;
    }

    /**
     * Generate the attributes code for HTML tag
     *
     * @return string The attributes code or empty string
     */
    protected function generate_attributes_code(): string {
        if ($this->is_self_closed && ($this->value !== 0) && ($this->value != NULL)) {
            $this->set_attrib("value", $this->value);
        }

        $attributes_count = count($this->attributes);
        $current_attribute = 0;
        $attributes_code = "";

        if ($attributes_count != 0) {
            foreach ($this->attributes as $attribute => $value) {
                $current_attribute++;
                if ($value !== TRUE && $value !== FALSE) {
                    $attributes_code .= "{$attribute}=\"{$value}\"";
                } else {
                    if ($value === TRUE) {
                        $attributes_code .= "{$attribute}";
                    }
                }
                $attributes_code .= ($current_attribute < $attributes_count) ? " " : "";
            }
            $this->attributes_code = $attributes_code;
            return " " . $this->attributes_code;
        } else {
            return "";
        }
    }

    /**
     * This will generate the HTML TAG with ALL his childs by default. If the TAG is not SELF CLOSED will generate all as <TAG attributeN="valueN">$value</TAG>
     *
     * @param bool $with_childs Whether to include children in generation
     * @param int $n_childs Not used, retained for compatibility
     * @return string The generated HTML
     */
    public function generate($with_childs = \TRUE, $n_childs = 0): string {
        if (self::$debug_tag) {
            $this->set_attrib('k1lib-class-name', get_class($this));
        }


        /**
         * Merge the child arrays HEAD, MAIN and TAIL collections
         */
        $all_childs = $this->get_all_children();

        $object_childs = count($all_childs);

        /**
         * TAB constructor
         */
        $tabs = str_repeat("\t", $this->child_level);
        /**
         * NL manager :)
         */
        $new_line = ($this->child_level >= 1) ? "\n" : "";

        $html_code = "{$new_line}{$tabs}<{$this->tag_name}";
        $html_code .= $this->generate_attributes_code();
        $html_code .= ">";

        $has_childs = FALSE;
        if (!$this->is_self_closed) {
            // VALUE first, then child objects
            $html_code .= $this->pre_value . $this->get_value($this->child_level);
            // Child objetcs generation
            if (($with_childs) && ($object_childs >= 1)) {
                $has_childs = TRUE;
                foreach ($all_childs as $child_object) {
                    if ($child_object->get_tag_id()) {
                        $child_object->child_level = $this->child_level + 1;
                        $html_code .= $child_object->generate();
                    }
                }
            }
            if ($has_childs || $this->has_children) {
                $html_code .= "\n";
            }
            $html_code .= $this->post_value . $this->generate_close();
        }
        $this->tag_code = $this->pre_code . $html_code . $this->post_code;
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] is generated");
        }

        return $this->tag_code;
    }

    /**
     * This will generate the HTML CLOSE TAG
     *
     * @return string The closing tag HTML
     */
    protected function generate_close(): string {
        /**
         * TAB constructor
         */
        if (($this->child_level > 0) && $this->has_children) {
            $tabs = str_repeat("\t", $this->child_level);
        } else {
            $tabs = '';
        }
        $html_code = "{$tabs}</{$this->tag_name}>";
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] close tag generated");
        }

        return $html_code;
    }

    /**
     * Returns the tag name. <tag name> or <tag name></tag name>
     *
     * @return string
     */
    public function get_tag_name(): string {
        return $this->tag_name;
    }

    /**
     * Return the FIRST object found with the $id
     *
     * @param string $id The id to search for
     * @return tag|null The found tag or null if not found
     */
    public function get_element_by_id($id): tag|null {
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will SEARCH by ID='$id'");
        }
        if ($this->get_tag_id()) {
            if ($this->get_attribute("id") == $id) {
                if (html_document::get_use_log()) {
                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} has the ID='$id' and is returned");
                }
                return $this;
            } else {
                $inline_tags = $this->get_inline_tags();
                $all_childs = $this->get_all_children();
                $all_childs = array_merge($inline_tags, $all_childs);
                foreach ($all_childs as $child) {
                    if (html_document::get_use_log()) {
                        tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will SEARCH by ID='$id' on child [{$child->get_tag_name()}] ID:{$child->tag_id}");
                    }
                    $child_search_result = $child->get_element_by_id($id);
                    if (!empty($child_search_result)) {
                        if (html_document::get_use_log()) {
                            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} has child [{$child->get_tag_name()}] ID:{$child->tag_id} with the ID='$id' and is returned");
                        }
                        return $child_search_result;
                    }
                }
            }
        }
        return null;
    }

    /**
     * This tries to work as in jQuery $('#id') could work. By now, just simple 1 term query as #myid .myclass mytag
     *
     * @param string $query The query string (#id, .class, or tagname)
     * @return tag|array|null The found tag, array of tags, or null
     */
    public function q(string $query): tag|array|null {
        $first_char = substr($query, 0, 1);
        $term = substr($query, 1);

        switch ($first_char) {
            case '#':
                $tag = $this->get_element_by_id($term);
                return $tag;

            case '.':
                $tags = $this->get_elements_by_class($term);
                if (count($tags) > 1) {
                    return $tags;
                } else if (count($tags) == 1) {
                    return $tags[0];
                } else {
                    return null;
                }

            default:
                $tags = $this->get_elements_by_tag($query);
                return $tags;
        }
    }

    /**
     * Return an Array with all the objects that TAG is $tag_name
     *
     * @param string $tag_name The tag name to search for
     * @return tag[]|null Array of found tags or null
     */
    public function get_elements_by_tag($tag_name): array|null {
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will SEARCH by TAG='$tag_name'");
        }
        $tags = [];
        if ($this->get_tag_id()) {
            if ($this->get_tag_name() == $tag_name) {
                if (html_document::get_use_log()) {
                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned");
                }
                $tags[] = $this;
            }
            /**
             * Child and inline tags
             */
            $inline_tags = $this->get_inline_tags();
            $all_childs = $this->get_all_children();
            $all_childs = array_merge($inline_tags, $all_childs);
            foreach ($all_childs as $child) {
                if (html_document::get_use_log()) {
                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} looking on child [{$child->get_tag_name()}] ID:{$child->tag_id}");
                }
                $child_search_result = $child->get_elements_by_tag($tag_name);
                if (!empty($child_search_result)) {
                    if (html_document::get_use_log()) {
                        tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return child [{$child->get_tag_name()}] ID:{$child->tag_id} results");
                    }
                    $tags = array_merge($tags, $child_search_result);
                }
            }
        }
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return " . count($tags) . " '$tag_name' tags");
        }

        return count($tags) > 0 ? $tags : null;
    }

    /**
     * Return an Array with all the objects that has ATTRIBUTE as $attribute_name
     *
     * @param string $attribute_name The attribute name to search for
     * @param bool $partial_text_search If true, search partial matches
     * @return tag[]|null Array of found tags or null
     */
    public function get_elements_by_attrib($attribute_name, $partial_text_search = FALSE): array|null {
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will SEARCH by ATTRIB='$attribute_name'");
        }
        $tags = [];
        if ($this->get_tag_id()) {
            if (array_key_exists($attribute_name, $this->attributes) && !$partial_text_search) {
                if (html_document::get_use_log()) {
                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned by exact match");
                }
                $tags[] = $this;
            } elseif ($partial_text_search) {
                foreach ($this->attributes as $attribute => $value) {
                    if (strstr($attribute, $attribute_name) !== FALSE) {
                        if (html_document::get_use_log()) {
                            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned by partial match");
                        }
                        $tags[] = $this;
                    }
                }
            }
            /**
             * Child and inline tags
             */
            $inline_tags = $this->get_inline_tags();
            $all_childs = $this->get_all_children();
            $all_childs = array_merge($inline_tags, $all_childs);
            foreach ($all_childs as $child) {
                if (html_document::get_use_log()) {
                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} looking on child [{$child->get_tag_name()}] ID:{$child->tag_id}");
                }
                $child_search_result = $child->get_elements_by_attrib($attribute_name);
                if (!empty($child_search_result)) {
                    if (html_document::get_use_log()) {
                        tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return child [{$child->get_tag_name()}] ID:{$child->tag_id} results");
                    }
                    $tags = array_merge($tags, $child_search_result);
                }
            }
        }
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return " . count($tags) . " '$attribute_name' attribute");
        }
        return count($tags) > 0 ? $tags : null;
    }

    /**
     * Return an Array with all the objects that has ATTRIBUTE as $attribute_name
     *
     * @param string $attribute_name The attribute name to search for
     * @param string $attribute_value The attribute value to match
     * @param bool $partial_attribute_text_search If true, search partial attribute names
     * @param bool $partial_value_text_search If true, search partial attribute values
     * @return tag[]|null Array of found tags or null
     */
    public function get_elements_by_attrib_value($attribute_name, $attribute_value, $partial_attribute_text_search = FALSE, $partial_value_text_search = FALSE): array|null {
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will SEARCH by ATTRIB='$attribute_name' and VALUE='$attribute_value'");
        }
        $tags = [];
        if ($this->get_tag_id()) {
            $tag_has_attribute = $this->get_elements_by_attrib($attribute_name, $partial_attribute_text_search);
            if (!empty($tag_has_attribute) && $partial_attribute_text_search) {
                foreach ($tag_has_attribute as $tag_to_look) {
                    $tag_attributes = $tag_to_look->get_attributes_array();
                    foreach ($tag_attributes as $attribute => $value) {
                        if (strstr($attribute, $attribute_name) !== FALSE) {
                            if ($partial_value_text_search && strstr($value, $attribute_value)) {
                                if (html_document::get_use_log()) {
                                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned by partial text and partial attrib match");
                                }
                                $tags[] = $tag_to_look;
                            } elseif ($attribute_value == $value) {
                                if (html_document::get_use_log()) {
                                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned by exact text and partial attrib match");
                                }
                                $tags[] = $tag_to_look;
                            }
                        }
                    }
                }
            } else if (!empty($tag_has_attribute) && !$partial_attribute_text_search) {
                foreach ($tag_has_attribute as $tag_to_look) {
                    $tag_attribute_value = $tag_to_look->get_attribute($attribute_name);
                    if ($partial_value_text_search && (strstr($tag_attribute_value, $attribute_value) !== FALSE)) {
                        if (html_document::get_use_log()) {
                            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned by partial text and exact attrib match");
                        }
                        $tags[] = $tag_to_look;
                    } elseif ($tag_attribute_value == $attribute_value) {
                        if (html_document::get_use_log()) {
                            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned by exact text and exact attrib match");
                        }
                        $tags[] = $tag_to_look;
                    }
                }
            }

            /**
             * Child and inline tags
             */
            $inline_tags = $this->get_inline_tags();
            $all_childs = $this->get_all_children();
            $all_childs = array_merge($inline_tags, $all_childs);
            foreach ($all_childs as $child) {
                if (html_document::get_use_log()) {
                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} looking on child [{$child->get_tag_name()}] ID:{$child->tag_id}");
                }
                $child_search_result = [];
                $child_search_result = $child->get_elements_by_attrib_value($attribute_name, $attribute_value, $partial_attribute_text_search, $partial_value_text_search);
                if (!empty($child_search_result)) {
                    if (html_document::get_use_log()) {
                        tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return child [{$child->get_tag_name()}] ID:{$child->tag_id} results");
                    }
                    $tags = array_merge($tags, $child_search_result);
                }
            }
        }
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return " . count($tags) . " '$attribute_name' attribute");
        }
        return count($tags) > 0 ? $tags : null;
    }

    /**
     * Return an Array with all the objects that CLASS is $class_name.
     * NOTE: This will work ONLY with 1 class at time, or multiple in exact order.
     *
     * @param string $class_name The class name to search for
     * @return tag[]|null Array of found tags or null
     */
    public function get_elements_by_class($class_name): array|null {
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will SEARCH by CLASS='$class_name'");
        }
        $classes = [];
        if ($this->get_tag_id()) {
            $class_attr = $this->get_attribute("class");
            if ($class_attr !== FALSE) {
                $class_array = explode(' ', trim($class_attr));
                if (in_array($class_name, $class_array)) {
                    if (html_document::get_use_log()) {
                        tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} is returned");
                    }
                    $classes[] = $this;
                }
            }
            /**
             * Child and inline tags
             */
            $inline_tags = $this->get_inline_tags();
            $all_childs = $this->get_all_children();
            $all_childs = array_merge($inline_tags, $all_childs);
            foreach ($all_childs as $child) {
                if (html_document::get_use_log()) {
                    tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} looking on child [{$child->get_tag_name()}] ID:{$child->tag_id}");
                }
                $child_search_result = $child->get_elements_by_class($class_name);
                if (!empty($child_search_result)) {
                    if (html_document::get_use_log()) {
                        tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return child [{$child->get_tag_name()}] ID:{$child->tag_id} results");
                    }
                    $classes = array_merge($classes, $child_search_result);
                }
            }
        }
        if (html_document::get_use_log()) {
            tag_log::log("[{$this->get_tag_name()}] ID:{$this->tag_id} will return " . count($classes) . " tags with CLASS='$class_name'");
        }

        return count($classes) > 0 ? $classes : null;
    }

    /**
     * TRUE if this Objects have children and FALSE if not.
     *
     * @return bool True if has children, false otherwise
     */
    function has_children(): bool {
        return $this->has_children;
    }

    /**
     * Merge and return the $children_head, $children and $children_tail
     *
     * @return tag[] Array of all child tags
     */
    protected function get_all_children(): array {
        /**
         * Merge the child arrays HEAD, MAIN and TAIL collections
         */
        $merged_childs = [];
        if (!empty($this->children_head)) {
            foreach ($this->children_head as $child) {
                $merged_childs[] = $child;
            }
        }
        if (!empty($this->children)) {
            foreach ($this->children as $child) {
                $merged_childs[] = $child;
            }
        }
        if (!empty($this->children_tail)) {
            foreach ($this->children_tail as $child) {
                $merged_childs[] = $child;
            }
        }
        return $merged_childs;
    }
}
