<?php

namespace rsmike\label;

/**
* @method static string|array label($item = null)
**/

abstract class Label
{
    public static function label($item = null, $set = 'label') {
        return isset($item) ? ($item === [] ? array_keys(static::${$set}) : (static::${$set}[$item] ?? $item)) : static::${$set};
    }

    public static function __callStatic($name, $arguments) {
        return static::label($arguments[0] ?? null, $name);
    }
}