<?php

/**
 * Static logging utility for tracking HTML tag operations.
 * Provides methods to record and retrieve log entries for debugging
 * and monitoring tag-related actions during document generation.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @package k1lib\html
 */

namespace k1lib\html;

class tag_log {

    /**
     * Accumulated log entries as a single string.
     * @var string
     */
    static protected string $log = "";

    /**
     * Returns the log with HTML special characters escaped for safe display.
     *
     * @return string The escaped log content
     */
    static function get_log(): string {
        return htmlspecialchars(self::$log);
    }

    /**
     * Returns the raw unescaped log content.
     *
     * @return string The raw log content
     */
    static function get_log_raw(): string {
        return self::$log;
    }

    /**
     * Appends a log entry to the internal log buffer.
     *
     * @param string $log The log message to record. Newline is added automatically.
     * @return void
     */
    static function log(string $log): void {
        self::$log .= $log . "\n";
    }
}