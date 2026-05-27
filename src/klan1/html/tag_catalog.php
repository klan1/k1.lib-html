<?php

/**
 * Central catalog for managing all HTML tag instances.
 * Provides static methods to track, retrieve, and manage tags throughout the document lifecycle.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */

namespace k1lib\html;

class tag_catalog {

    /**
     * Array storing all cataloged tag objects indexed by their unique ID.
     * @var tag[]
     */
    static protected array $catalog = [];

    /**
     * Current index counter for assigning unique IDs to new tags.
     * @var int
     */
    static protected int $index = 0;

    /**
     * Gets the current index position for the catalog.
     *
     * Returns the last assigned index value, which represents how many
     * tags have been cataloged since the script started.
     *
     * @return int The current catalog index
     */
    static function get_index(): int {
        return self::$index;
    }

    /**
     * Retrieves a tag object from the catalog by its index.
     *
     * @param int $index The unique tag index to look up
     * @return tag|null The tag object if found, null otherwise
     */
    static function get_by_index(int $index): tag|null {
        if (self::index_exist($index)) {
            return self::$catalog[$index];
        } else {
            return null;
        }
    }

    /**
     * Checks if a catalog index exists.
     *
     * @param int $index The index to check
     * @return bool True if the index exists and has a tag, false otherwise
     */
    static function index_exist(int $index): bool {
        return isset(self::$catalog[$index]);
    }

    /**
     * Increases the catalog index and registers a new tag object.
     *
     * @param tag $tag_object The tag object to catalog
     * @return int The new index value assigned to the tag
     */
    static function increase(tag $tag_object): int {
        self::$index++;
        self::$catalog[self::$index] = $tag_object;
        return self::$index;
    }

    /**
     * Removes a tag from the catalog by index or object reference.
     *
     * Once decataloged, the tag will no longer be found in search operations
     * or included in chain generation actions.
     *
     * @param int|tag $tag_index The tag index or tag object to decatalog
     * @return void
     */
    static function decatalog(int|tag $tag_index): void {
        if (is_object($tag_index) && method_exists($tag_index, "get_tag_id")) {
            $tag_index = $tag_index->get_tag_id();
        }
        if (isset(self::$catalog[$tag_index])) {
            unset(self::$catalog[$tag_index]);
        }
    }

    /**
     * Checks if a tag object is currently cataloged.
     *
     * @param int|tag $tag_index The tag index or tag object to check
     * @return bool True if the tag is cataloged, false otherwise
     */
    static function is_cataloged(int|tag $tag_index): bool {
        if (is_object($tag_index) && method_exists($tag_index, "get_tag_id")) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns the complete catalog array of all registered tag objects.
     *
     * @return tag[] Array of all cataloged tag objects indexed by ID
     */
    static function get_catalog(): array {
        return self::$catalog;
    }
}