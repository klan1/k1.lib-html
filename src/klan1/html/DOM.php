<?php

/**
 * Static helper class providing global access to the HTML document instance.
 * Acts as a facade for the main html_document object, enabling centralized
 * document management and easy access from anywhere in the application.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */

namespace k1lib\html;

class DOM {

    /**
     * The singleton HTML document instance.
     * @var html_document|null
     */
    static protected html_document|null $html_document = null;

    /**
     * Initializes and stores the HTML document instance globally.
     *
     * @param html_document $html_document The document instance to register
     * @return html_document Returns the registered document instance
     */
    static function start(html_document $html_document): html_document {
        self::$html_document = $html_document;
        return self::$html_document;
    }

    /**
     * Checks if the DOM has been initialized with a document.
     *
     * @return bool True if a document is registered, false otherwise
     */
    static function is_started(): bool {
        return !empty(self::$html_document);
    }

    /**
     * Gets the registered HTML document instance.
     *
     * @return html_document The current HTML document
     */
    static function html(): html_document {
        return self::$html_document;
    }

    /**
     * Generates and returns the complete HTML document as a string.
     *
     * @return string The generated HTML output
     */
    static function generate(): string {
        return self::$html_document->generate();
    }
}