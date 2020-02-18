# PHP Labels

A simple way to organise constant collections and constant=>string dictionaries.

### Example label class:
```php
/**
 * An example label class.
 *
 * @method static string|array status($item = [])
 * @method static string|array abbr($item = [])
 */
 
abstract class TestLabels extends rsmike\label\Label
 {
    const INACTIVE = 0;
    const ACTIVE = 1;
    const OTHER = 3;
    
    protected static $status = [
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
        self::OTHER => 'Other',
    ];

    protected static $abbr = [
        self::ACTIVE => 'A',
        self::INACTIVE => 'I'
    ];
 }
 ```

#### Notes:
* make sure to declare '@method static' PHPDoc for autocomplete to work
* classes should be declared abstract to avoid instantiation

### Usage:
`TestLabels::status(TestLabels::ACTIVE);` Returns: 'Active'

`TestLabels::abbr(0);` Returns: 'I'

`TestLabels::status(2);` Returns: 2 (pass-through)

`TestLabels::status(3);` Returns: 'Other'

`TestLabels::status(null);` Returns: null (pass-through)

`TestLabels::status();` Returns:  [1=>'Active', 0=>'Inactive'] (complete set of options. Useful for dropdowns etc. )

`TestLabels::status([]);` Returns: [1=>'Active', 0=>'Inactive']  (same as above)

`TestLabels::status([0]);` Returns: [1, 0] (all available keys)

`TestLabels::status([[0, 3]]);` Returns: [0=>'Inactive', 3=>'Other'] (subset)

#### Default value:

An additional parameter may be passed as a default value instead of pass-through:

`TestLabels::status(2, 'N/A');` Returns: 'N/A' (key not found)

`TestLabels::status(null, 'N/A');` Returns: 'N/A' (always returns default value on null)

#### Yes/No:

YN method is a built-in example and may be used in any sub-class
`TestLabels::YN(1)` Returns: 'Yes'

$YN is protected and may be overridden in a subclass.

## Installation

Either run
```bash
$ composer require rsmike/label:~1.1
```

or add
```
"rsmike/label": "~1.1"
```
to the `require` section of your `composer.json` file.

### Changelog
##### v1.1
* Subset functionality

##### v1.0
* YN is now builtin
* label() method removed
* Fallback value functionality

##### v0.3.4
* changed default shortcuts to `[]` and `[0]`
##### v0.3.4
* array keys shortcut
##### v0.3
* dev version

### TODO

 * tests