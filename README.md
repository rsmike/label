# PHP Labels

A simple way to organise constant collections and constant=>string dictionaries.

### Example child class (see also simple YN class):
```php
/**
* @method static string abbr($item = null)
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
* public static array `$label` must be set
* every additional array e.g. `$abbrs` should have a corresponding @method static PHPdoc
* classes should be declared abstract to avoid instantiation

### Usage:
`echo TestLabels::label(TestLabels::ONE)` prints 'One label' 

`echo TestLabels::label(TestLabels::ONE,'abbr')` prints 'OLL'

`echo TestLabels::abbr(TestLabels::TWO)` prints 'TLL'

`TestLabels::abbr()` or `TestLabels::label(null,'abbr')` returns $abbr array (same as calling `TestLabels::$abbr`)

## Installation

Either run
```bash
$ composer require rsmike/label:~0.3.1
```

or add
```
"rsmike/label": "~0.3.1"
```
to the `require` section of your `composer.json` file.

### Changelog
##### v0.3
* dev version

### TODO

 * tests
 * consider making arrays private