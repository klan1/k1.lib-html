<?php

namespace k1lib\html;

class head extends tag {

    use append_shortcuts;

    /**
     * The title element for the document head.
     * @var title|null
     */
    protected title|null $title = null;

    /**
     * Initializes a new head element with a default title.
     *
     * @return void
     */
    function __construct() {
        parent::__construct("head", IS_NOT_SELF_CLOSED);
        $this->append_title();
    }

    /**
     * Creates and appends a title element to the head section.
     *
     * @return title The newly created title element
     */
    function append_title(): title {
        $this->title = new title();
        $this->append_child_head($this->title);
        return $this->title;
    }

    /**
     * Sets the document title text.
     *
     * @param string $document_title The title text to set
     * @return void
     */
    function set_title(string $document_title): void {
        if ($this->title !== null) {
            $this->title->set_value($document_title);
        }
    }

    /**
     * Gets the current document title text.
     *
     * @return string The title text value
     */
    public function get_title(): string {
        return $this->title->get_value();
    }

    /**
     * Creates and appends a CSS link element to the head section.
     *
     * @param string|null $href The URL of the CSS file
     * @return link The newly created link element
     */
    function link_css(string|null $href = NULL): link {
        $new = new link($href);
        $this->append_child_tail($new);
        return $new;
    }

    /**
     * Creates and appends a JavaScript link element to the head section.
     *
     * @param string|null $src The URL of the JavaScript file
     * @return script The newly created script element
     */
    function link_js(string|null $src = NULL): script {
        $new = new script($src);
        $this->append_child_tail($new);
        return $new;
    }

    /**
     * Creates and appends a meta element to the head section.
     *
     * @param string|null $name The name attribute for the meta tag
     * @param string|null $content The content attribute value
     * @return meta The newly created meta element
     */
    function append_meta(string|null $name = NULL, string|null $content = NULL): meta {
        $new = new meta($name, $content);
        $this->append_child_tail($new);
        return $new;
    }
}