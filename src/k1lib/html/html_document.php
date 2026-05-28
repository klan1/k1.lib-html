<?php

/**
 * Main HTML document container that structures a complete web page.
 * Extends the tag class to represent the root <html> element and
 * provides convenient access to <head> and <body> child elements.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */

namespace k1lib\html;

class html_document extends tag {

    use append_shortcuts;

    /**
     * The head section containing metadata and resource links.
     * @var head
     */
    protected head $head;

    /**
     * The body section containing visible page content.
     * @var body
     */
    protected body $body;

    /**
     * The document language attribute value.
     * @var string
     */
    protected string $lang;

    /**
     * The character encoding for the document.
     * @var string|null
     */
    protected string|null $charset = null;

    /**
     * The viewport configuration for responsive design.
     * @var string|null
     */
    protected string|null $viewport = null;

    /**
     * Initializes a new HTML document with optional custom head and body.
     *
     * @param string $lang Document language code (e.g., "en", "es"). Default: "en"
     * @param bool $use_custom_head If true, skips automatic head element creation
     * @param bool $use_custom_body If true, skips automatic body element creation
     * @return void
     */
    function __construct(string $lang = "en", bool $use_custom_head = false, bool $use_custom_body = false) {
        parent::__construct("html", IS_NOT_SELF_CLOSED);

        parent::$root = $this;

        $this->pre_code("<!DOCTYPE html>\n");

        $this->set_lang($lang);

        if (!$use_custom_head) {
            $this->head = new head();
            $this->append_child($this->head);
        }
        if (!$use_custom_body) {
            $this->body = new body();
            $this->append_child($this->body);
        }
    }

    /**
     * Sets the document language attribute.
     *
     * @param string $lang The language code (e.g., "en", "es")
     * @return html_document Returns self for method chaining
     */
    public function set_lang(string $lang): html_document {
        $this->lang = $lang;
        $this->set_attrib("lang", $this->lang);
        return $this;
    }

    /**
     * Gets the document language attribute.
     *
     * @return string The current language code
     */
    public function get_lang(): string {
        return $this->lang;
    }

    /**
     * Sets the document character encoding via a meta tag in the head.
     *
     * @param string $charset The character encoding (e.g., "utf-8", "ISO-8859-1"). Default: "utf-8"
     * @return html_document Returns self for method chaining
     */
    public function set_charset(string $charset = "utf-8"): html_document {
        $this->charset = $charset;
        $meta = new meta("charset", $charset);
        $meta->set_attrib("charset", $charset);
        $this->head()->append_child_head($meta);
        return $this;
    }

    /**
     * Gets the document character encoding.
     *
     * @return string|null The charset value or null if not set
     */
    public function get_charset(): string|null {
        return $this->charset;
    }

    /**
     * Sets the viewport meta tag for responsive design.
     *
     * @param string $content The viewport content value. Default: "width=device-width, initial-scale=1"
     * @return html_document Returns self for method chaining
     */
    public function set_viewport(string $content = "width=device-width, initial-scale=1"): html_document {
        $this->viewport = $content;
        $meta = new meta("viewport", $content);
        $meta->set_attrib("name", "viewport");
        $meta->set_attrib("content", $content);
        $this->head()->append_child_head($meta);
        return $this;
    }

    /**
     * Gets the viewport configuration string.
     *
     * @return string|null The viewport content or null if not set
     */
    public function get_viewport(): string|null {
        return $this->viewport;
    }

    /**
     * Generates the complete HTML document as a string.
     *
     * Automatically sets default charset and viewport if not already configured
     * before rendering the document structure.
     *
     * @param bool $with_childs Whether to include child elements in generation. Default: true
     * @param int $n_childs Unused parameter retained for compatibility. Default: 0
     * @return string The complete HTML document string
     */
    public function generate($with_childs = true, $n_childs = 0): string {
        if (empty($this->charset)) {
            $this->set_charset("utf-8");
        }
        if (empty($this->viewport)) {
            $this->set_viewport("width=device-width, initial-scale=1");
        }
        return parent::generate($with_childs, $n_childs);
    }

    /**
     * Gets the head section element.
     *
     * @return head The head element containing metadata
     */
    function head(): head {
        return $this->head;
    }

    /**
     * Gets the body section element.
     *
     * @return body The body element containing visible content
     */
    function body(): body {
        return $this->body;
    }
}