<?php

namespace k1lib\html;

trait append_shortcuts {

    /**
     * Appends a new div element as a child
     *
     * @param string|null $class Optional CSS class for the div
     * @param string|null $id Optional ID attribute for the div
     * @return div The newly created div element
     */
    function append_div(string|null $class = NULL, string|null $id = NULL): div {
        $new = new div($class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new span element as a child.
     *
     * @param string|null $class Optional CSS class for the span
     * @param string|null $id Optional ID attribute for the span
     * @return span The newly created span element
     */
    function append_span(string|null $class = NULL, string|null $id = NULL): span {
        $new = new span($class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new paragraph (p) element as a child.
     *
     * @param string|null $value Optional text content for the paragraph
     * @param string|null $class Optional CSS class for the paragraph
     * @param string|null $id Optional ID attribute for the paragraph
     * @return p The newly created paragraph element
     */
    function append_p(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): p {
        $new = new p($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new unordered list (ul) element as a child.
     *
     * @param string|null $class Optional CSS class for the unordered list
     * @param string|null $id Optional ID attribute for the unordered list
     * @return ul The newly created unordered list element
     */
    function append_ul(string|null $class = NULL, string|null $id = NULL): ul {
        $new = new ul($class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new list item (li) element as a child.
     *
     * @param string|null $value Optional text content for the list item
     * @param string|null $class Optional CSS class for the list item
     * @param string|null $id Optional ID attribute for the list item
     * @return li The newly created list item element
     */
    function append_li(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): li {
        $new = new li($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new italic/emphasis (i) element as a child.
     *
     * @param string|null $value Optional text content for the italic element
     * @param string|null $class Optional CSS class for the italic element
     * @param string|null $id Optional ID attribute for the italic element
     * @return i The newly created italic element
     */
    function append_i(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): i {
        $new = new i($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new preformatted text (pre) element as a child.
     *
     * @param string|null $value Optional text content for the pre element
     * @param string|null $class Optional CSS class for the pre element
     * @param string|null $id Optional ID attribute for the pre element
     * @return pre The newly created preformatted text element
     */
    function append_pre(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): pre {
        $new = new pre($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new anchor (a) hyperlink element as a child.
     *
     * @param string|null $href The URL for the hyperlink
     * @param string|null $label The visible text for the link
     * @param string|null $target The target attribute (_blank, _self, etc.)
     * @param string|null $class Optional CSS class for the anchor
     * @param string|null $id Optional ID attribute for the anchor
     * @return a The newly created anchor element
     */
    function append_a(string|null $href = NULL, string|null $label = NULL, string|null $target = NULL, string|null $class = NULL, string|null $id = NULL): a {
        $new = new a($href, $label, $target, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new image (img) element as a child.
     *
     * @param string|null $src The image source URL
     * @param string $alt Alternative text for the image. Default: "Image"
     * @param string|null $class Optional CSS class for the image
     * @param string|null $id Optional ID attribute for the image
     * @return img The newly created image element
     */
    function append_img(string|null $src = NULL, string $alt = 'Image', string|null $class = NULL, string|null $id = NULL): img {
        $new = new img($src, $alt, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new heading level 1 (h1) element as a child.
     *
     * @param string|null $value Optional text content for the heading
     * @param string|null $class Optional CSS class for the heading
     * @param string|null $id Optional ID attribute for the heading
     * @return h1 The newly created h1 element
     */
    function append_h1(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): h1 {
        $new = new h1($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new heading level 2 (h2) element as a child.
     *
     * @param string|null $value Optional text content for the heading
     * @param string|null $class Optional CSS class for the heading
     * @param string|null $id Optional ID attribute for the heading
     * @return h2 The newly created h2 element
     */
    function append_h2(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): h2 {
        $new = new h2($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new heading level 3 (h3) element as a child.
     *
     * @param string|null $value Optional text content for the heading
     * @param string|null $class Optional CSS class for the heading
     * @param string|null $id Optional ID attribute for the heading
     * @return h3 The newly created h3 element
     */
    function append_h3(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): h3 {
        $new = new h3($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new heading level 4 (h4) element as a child.
     *
     * @param string|null $value Optional text content for the heading
     * @param string|null $class Optional CSS class for the heading
     * @param string|null $id Optional ID attribute for the heading
     * @return h4 The newly created h4 element
     */
    function append_h4(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): h4 {
        $new = new h4($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new heading level 5 (h5) element as a child.
     *
     * @param string|null $value Optional text content for the heading
     * @param string|null $class Optional CSS class for the heading
     * @param string|null $id Optional ID attribute for the heading
     * @return h5 The newly created h5 element
     */
    function append_h5(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): h5 {
        $new = new h5($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new heading level 6 (h6) element as a child.
     *
     * @param string|null $value Optional text content for the heading
     * @param string|null $class Optional CSS class for the heading
     * @param string|null $id Optional ID attribute for the heading
     * @return h6 The newly created h6 element
     */
    function append_h6(string|null $value = NULL, string|null $class = NULL, string|null $id = NULL): h6 {
        $new = new h6($value, $class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * Appends a new label element as a child.
     *
     * @param string|null $label The label text content
     * @param string|null $for The ID of the form element this label is associated with
     * @param string|null $class Optional CSS class for the label
     * @param string|null $id Optional ID attribute for the label
     * @return label The newly created label element
     */
    function append_label(string|null $label = NULL, string|null $for = NULL, string|null $class = NULL, string|null $id = NULL): label {
        $new = new label($label, $for, $class, $id);
        $this->append_child($new);
        return $new;
    }
}