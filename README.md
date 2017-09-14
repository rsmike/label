# PHP Labels

A simple way to organise constant collections and constant=>string dictionaries.

### Example child class (see also simple YN class):
```php
/**
* @method static string|array abbr($item = null)
**/
abstract class TestLabels extends rsmike\label\Label
 {
    const ONE = 1;
    const TWO = 2;
    
    public static $label = [
        self::ONE => 'One label',
        self::TWO => 'Two label'
    ];

    public static $abbr = [
        self::ONE => 'OLL',
        self::TWO => 'TLL'
    ];
 }
 ```

#### Notes:
* public static array `$label` should be set for label() function to work with default value
* every additional array e.g. `$abbrs` should have a corresponding @method static PHPdoc
* classes should be declared abstract to avoid instantiation

### Usage:
`echo TestLabels::label(TestLabels::ONE)` prints 'One label' 

`echo TestLabels::label(TestLabels::ONE,'abbr')` prints 'OLL'

`echo TestLabels::abbr(TestLabels::TWO)` prints 'TLL'

`TestLabels::abbr()` or `TestLabels::label(null,'abbr')` returns $abbr array (same as calling `TestLabels::$abbr`)

`TestLabels::abbr([])` or `TestLabels::label([],'abbr')` (empty array as first parameter) returns array_keys of $abbr array (same as calling `array_keys(TestLabels::$abbr)`)

## Installation

Either run
```bash
$ composer require rsmike/label:~0.3
```

or add
```
"rsmike/label": "~0.3"
```
to the `require` section of your `composer.json` file.

### Changelog
##### v0.3.4
* array keys shortcut
##### v0.3
* dev version

### TODO

 * tests
 * consider making arrays private