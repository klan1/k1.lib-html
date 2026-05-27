# PHP Compatibility Analysis

**Repository:** k1.lib-html
**Last Updated:** 2026-05-27

## PHP Version Compatibility Matrix

| Version | Compatible | Reason |
|---------|------------|--------|
| 7.4 | ❌ No | Uses union types (`string\|null`) and nullsafe operator (`?->`) - both PHP 8.0+ |
| 8.0 | ✅ Yes | All features are PHP 8.0+ compatible |
| 8.1 | ✅ Yes | No features beyond PHP 8.1 |
| 8.2 | ✅ Yes (current) | Current target version |
| 8.3 | ✅ Yes | No deprecated features used |
| 8.4 | ✅ Yes | No issues expected |
| 8.5 | ✅ Yes | No issues expected |

## Features Used and Their PHP Version Introduction

| Feature | Example | Introduced |
|---------|---------|------------|
| Return types | `function foo(): string` | PHP 7.4 |
| Nullable types | `?string` | PHP 7.4 |
| Union types | `string\|null` | PHP 8.0 |
| Nullsafe operator | `$obj?->method()` | PHP 8.0 |
| Named parameters | `foo(bar: 'baz')` | PHP 8.0 (not used) |
| Constructor property promotion | `function __construct(public string $x)` | PHP 8.0 (not used) |
| Attributes | `#[Attribute]` | PHP 8.0 (not used) |
| Match expression | `match($x) { ... }` | PHP 8.0 (not used) |

## Current composer.json Requirement

```json
"require": {
    "php": "^8.2"
}
```

## To Support PHP 7.4

If PHP 7.4 support is required, the following changes would be needed:

1. Replace union types: `string|null` → `?string`
2. Replace union types: `int|null` → `?int`
3. Replace union types: `bool|null` → `?bool`
4. Replace union types: `tag|null` → `?tag`
5. Replace nullsafe operators with null checks before method calls

### Example Conversion

**PHP 8.0+ code:**
```php
function get_charset(): string|null {
    return $this->charset;
}

$value = $obj?->method();
```

**PHP 7.4 compatible:**
```php
/**
 * @return string|null
 */
function get_charset() {
    return $this->charset;
}

$value = (isset($obj)) ? $obj->method() : null;
```

## Recommendation

**Keep `^8.2` as minimum requirement.** PHP 7.4 reached end-of-life in December 2022. Very few production servers still run 7.4, and the rewrite effort to support it provides minimal benefit.

All PHP versions from 8.0 through 8.5 are fully supported and will work without modification.