<?php

namespace rsmike\label;

abstract class Label
{
    public static function label($item = null, $set = 'label') {
        return isset($item) ? (static::${$set}[$item] ?? $item) : static::${$set};
    }

    public static function __callStatic($name, $arguments) {
        return static::label($arguments[0] ?? null, $name);
    }
}