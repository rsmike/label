<?php
/**
 * Created by PhpStorm.
 * User: rsmike
 * Date: 09/09/2017
 * Time: 14:53
 */

namespace rsmike\label;

class YN extends Label
{
    const YES = 1;
    const NO = 0;

    public static $label = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];
}