<?php

namespace rsmike\label;

/**
 * Label (dictionary) class
 *
 * Add static arrays in subclasses to work as dictionary functions:
 *
 * class TestLabel extends Label {
 *     private static $status = [
 *         0 => 'Inactive',
 *         1 => 'Active'
 *     ];
 * }
 *
 * General use:
 * echo TestLabel::status(1); // 'Active'
 * echo TestLabel::status(0); // 'Inactive'
 * echo TestLabel::status(2); // 2 (pass-through)
 * echo TestLabel::status(null); // null (pass-through)
 * echo TestLabel::status(); // [0=>'Inactive', 1=>'Active']
 * echo TestLabel::status([]); // [0=>'Inactive', 1=>'Active']
 * echo TestLabel::status([0]); // [0, 1] (available keys)
 *
 * An additional parameter may be passed as a default value instead of pass-through:
 * echo TestLabel::status(2, 'N/A'); // 'N/A' (key not found)
 * echo TestLabel::status(null, 'N/A'); // 'N/A' (always returns default value on null)
 *
 * YN method is a built-in example and may be used in any sub-class
 * echo TestLabel::YN(1) // 'Yes'
 *
 * @method static string|array YN($item = [])
 */

abstract class Label
{
    protected static $YN = [
        1 => 'Yes',
        0 => 'No',
    ];

    public static function __callStatic($name, $arguments) {
        if (count($arguments)) {
            if (is_null($arguments[0])) {
                return $arguments[1] ?? null;
            }
            if ($arguments[0] === []) {
                return static::${$name};
            }
            if ($arguments[0] === [0]) {
                return array_keys(static::${$name});
            }
            return static::${$name}[$arguments[0]] ?? $arguments[1] ?? $arguments[0];
        }
        return static::${$name};
    }
}