# k1.lib-html

A comprehensive PHP library for generating HTML documents and components using an object-oriented approach. This package is a modular extraction of the HTML generation tools from the main `k1.lib` library.

## Features

- **DOM-like Structure**: Create HTML documents by nesting objects, mirroring the natural structure of HTML.
- **Comprehensive Tag Support**: Dedicated classes for almost all standard HTML tags (`div`, `table`, `form`, `input`, `p`, etc.). Recently expanded to include full Semantic Layout, Text Formatting, Table and List tags.

- **Framework Integrations**: Built-in support for Bootstrap specialized components and methods for layouts.
- **Flexible Attributes**: Easily set and modify HTML attributes through a fluent API.
- **Component-Based**: Includes reusable components like accordions, modals, and grids.

## Installation

Install via Composer:

```bash
composer require klan1/k1.lib-html
```

## Quick Start

```php
use k1lib\html\html_document;
use k1lib\html\body;
use k1lib\html\div;

$doc = new html_document();
$body = $doc->append_body();
$div = $body->append_div("main-container");
$div->set_value("Hello, k1lib.html!");

echo $doc->generate();
```

## Debug Mode

Enable debug mode to automatically add `class_name` attributes to all generated HTML tags, showing the PHP class name that generated each element:

```php
// Enable debug mode
\k1lib\html\tag::debug(true);

// Now all generate() calls will include class_name attribute
$div = new \k1lib\html\div();
$div->set_value("Content");
// Output: <div class_name="k1lib\html\div">Content</div>

// Disable debug mode
\k1lib\html\tag::debug(false);

// Check current debug state
$isDebug = \k1lib\html\tag::debug(); // returns bool
```

## License

This project is licensed under the Apache-2.0 License.

---
Alejandro Trujillo J.
**GitHub: **[github.com/j0hnd03](https://github.com/j0hnd03)
