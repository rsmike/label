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
 *         1 => 'Active',
 *         2 => 'Other',
 *     ];
 * }
 *
 * General use:
 * echo TestLabel::status(1); // 'Active'
 * echo TestLabel::status(0); // 'Inactive'
 * echo TestLabel::status(5); // 5 (pass-through)
 * echo TestLabel::status(null); // null (pass-through)
 * echo TestLabel::status([0, 2]); // [0, 2] (pass-through, invalid input)
 * echo TestLabel::status(); // [0=>'Inactive', 1=>'Active', 2=>'Other']
 * echo TestLabel::status([]); // [0=>'Inactive', 1=>'Active', 2=>'Other']
 * echo TestLabel::status([0]); // [0, 1, 2] (available keys)
 * echo TestLabel::status([[0, 2]]); // [0=>'Inactive', 1=>'Active', 2=>'Other'] (subset)
 *
 * An additional parameter may be passed as a default value instead of pass-through:
 * echo TestLabel::status(5, 'N/A'); // 'N/A' (key not found)
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
            if (is_array($arguments[0])) {
                if ($arguments[0] === []) {
                    return static::${$name};
                }
                if ($arguments[0] === [0]) {
                    return array_keys(static::${$name});
                }
                if (is_array($arguments[0][0])) {
                    return array_intersect_key(static::${$name}, array_flip($arguments[0][0]));
                }
            } else {
                return static::${$name}[$arguments[0]] ?? $arguments[1] ?? $arguments[0];
            }
        }
        return static::${$name};
    }
}