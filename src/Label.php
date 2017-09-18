<?php

namespace rsmike\label;

// Example PHPDoc

// @method static string|array label($item = null)

abstract class Label
{
    public static function label($item = [], $set = 'label') {
        if (!isset($item)) {
            return null;
        }
        if ($item === []) {
            return static::${$set};
        }
        if ($item === [0]) {
            return array_keys(static::${$set});
        }
        return static::${$set}[$item] ?? $item;
    }

    public static function __callStatic($name, $arguments) {
        return static::label($arguments[0] ?? [], $name);
    }
}