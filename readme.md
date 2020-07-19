![BannerWithImageAndText](https://user-images.githubusercontent.com/5783354/87884417-03402d80-ca30-11ea-8fdc-5df12ca0e0aa.png)
<br>


![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/ahamed/JsPhp?labelColor=black&color=4ec428) ![GitHub](https://img.shields.io/github/license/ahamed/JsPhp?labelColor=black&color=4fc529) ![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/ahamed/JsPhp/PHP%20Composer/master?labelColor=black) ![GitHub issues](https://img.shields.io/github/issues/ahamed/JsPhp?color=c50a16&labelColor=black) ![GitHub closed issues](https://img.shields.io/github/issues-closed/ahamed/JsPhp?labelColor=black) ![GitHub pull requests](https://img.shields.io/github/issues-pr/ahamed/JsPhp?color=c50a16&labelColor=black) ![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed/ahamed/JsPhp?labelColor=black) ![GitHub language count](https://img.shields.io/github/languages/count/ahamed/JsPhp?labelColor=black) ![GitHub top language](https://img.shields.io/github/languages/top/ahamed/JsPhp?labelColor=black) ![GitHub repo size](https://img.shields.io/github/repo-size/ahamed/JsPhp?labelColor=black) ![GitHub All Releases](https://img.shields.io/github/downloads/ahamed/JsPhp/total?labelColor=black) ![GitHub contributors](https://img.shields.io/github/contributors/ahamed/JsPhp?labelColor=black) ![GitHub last commit](https://img.shields.io/github/last-commit/ahamed/JsPhp?labelColor=black) ![GitHub Release Date](https://img.shields.io/github/release-date/ahamed/JsPhp?labelColor=black) ![GitHub release (latest by date including pre-releases)](https://img.shields.io/github/v/release/ahamed/JsPhp?include_prereleases&labelColor=black) ![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/ahamed/JsPhp?labelColor=black)

![Packagist Version](https://img.shields.io/packagist/v/ahamed/JsPhp?labelColor=black) ![Packagist Downloads](https://img.shields.io/packagist/dm/ahamed/JsPhp?color=f18d1b&label=Packagist%20Downloads&labelColor=black) ![Packagist Stars](https://img.shields.io/packagist/stars/ahamed/JsPhp?labelColor=black)

Table Of Contents
=================
<details>
    <summary>
        Show Table of Contents
    </summary>

* [Why this library?](#why-this-library)
* [Installation](#installation)
* [Usage](#usage)
* [Array Methods](#array-methods)
    * [# concat](#-concat)
        * [Example](#example)
        * [Syntax](#syntax)
        * [Parameters](#parameters)
        * [Return Value](#return-value)
    * [# every](#-every)
        * [Example](#example-1)
        * [Syntax](#syntax-1)
        * [Parameters](#parameters-1)
        * [Return Value](#return-value-1)
    * [# fill](#-fill)
        * [Example](#example-2)
        * [Syntax](#syntax-2)
        * [Parameters](#parameters-2)
        * [Return Value](#return-value-2)
    * [# forEach](#-foreach)
        * [Example](#example-3)
        * [Syntax](#syntax-3)
        * [Parameters](#parameters-3)
        * [Return Value](#return-value-3)
    * [# map](#-map)
        * [Example](#example-4)
        * [Syntax](#syntax-4)
        * [Parameters](#parameters-4)
        * [Return Value](#return-value-4)
</details>

## Why this library?
While using ***php*** *Array/Object/String* methods it feels troublesome because of their unstructured patterns.

For an example, say you are using the `array_map` and the `array_filter` methods of *php*. At the time of using, you may notice that for the `array_map` method, the `$callback` comes first then the `$array` but for the `array_filter` method, the `$array` comes first then the `$callback`. And this mis-structure exists everywhere.

Then I've discovered that the **JavaScript** uses a good pattern for these cases and I am also a big fan of JavaScript. Thats why, I've decided to build this library. I can say that the JavaScript lovers can get the pure feelings of JavaScript by using this and the JavaScript non-lovers also get advantage of good structure of *array/object/string* manipulations.

## Installation
Installation is very simple. Open your terminal at the project root directory and run-
```console
composer require ahamed/jsphp
```

## Usage
After successful installation, include the library into your project.

```php
require_once __DIR__ . '/vendor/autoload.php';

use Ahamed\JsPhp\JsArray;

$data = [1, 2, 3, 4, 5];
$array = new JsArray($data);

$square = $array->map(
    function ($item) {
        return $item * $item;
    }
);

print_r($square);
```

## Array Methods
Here we cover most of the useful array methods. We now learn them one by one.

>Before performing any array operations you have to pass the array to the `JsArray` constructor i.e. you have to create an `JsArray` instance with the native *php* array for performing array operations, like-

```php
$array = new JsArray([1, 2, 3, 4]);
```

### # concat
The `concat()` method is used to merge two or more arrays. This is not change the original array but returns a new array after merging.

#### Example
```php
$array1 = new JsArray([1, 2, 3]);
$array2 = new JsArray([4, 5, 6]);
$newArray = $array1->concat($array2);

print_r($newArray);
// Expected output: JsArray [1, 2, 3, 4, 5, 6]
```

#### Syntax
```php
$newArray = $array->concat([$value1 [, $value2 [, ...[, $valueN]]]]);
```

#### Parameters
- ***`$valueN`***
    Arrays and/or scalar values to concatenate into a new array. If all *`$valueN`* parameters are omitted then `concat` returns the copy of the original array.

#### Return Value
A new `JsArray` instance.

### # every
The `every()` method tests whether all items in the array pass the test implemented by the user function. It returns a boolean value.

#### Example
```php
$array = new JsArray([1, 3, 5, 7]);
$isAllItemsOdd = $array->every(
    function ($item) {
        return $item % 2 === 1;
    }
);

var_dump($isAllItemsOdd);
// Expected output: bool(true)

// Using Arrow Function
$isAllItemsEven = $array->every(fn($item) => $item % 2 === 0);
var_dump($isAllItemsEven);
// Expected output: bool(false)
```

#### Syntax
```php
$isPassed  = $array->every($callback($item [, $index [, $key]]));
```

#### Parameters
- ***`$callback`***
    A function to test for each item. This function takes three arguments. One required and two optional.
    + ***`$item`***
        The current item to test on.
    + ***`$index`*** *(optional)*
        A zero based index of the current item.
    + ***`$key`*** *(optional)*
        The key of the current item of the array being processed.

#### Return Value
**Boolean**. `True` if all the items pass the user defined test and `False` otherwise.

### # fill
The `fill()` method changes all elements by a static value within a range `[$start, $end)`. The `$start` is zero based index number and the `end` is also zero based index number but the `$end` index does not change. I.e. the `$end` is exclusive.
- If the `$start` is negative then it's treated as `$array->length + $start` but the summation never be negative. If negative then it takes `0` as `$start` value.
- If the `$end` is negative then it's treated as `$array->length + $end` but the summation never be negative. If negative then it takes `0` as `$end` value.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);

$array->fill(0);
print_r($array);
// Expected output: JsArray [0, 0, 0, 0, 0]

$array->fill(2, 2, 4);
print_r($array);
// Expected output: JsArray [0, 0, 2, 2, 0]

$array->fill(3, -2);
print_r($array);
// Expected output: JsArray [0, 0, 2, 3, 3];
```

#### Syntax
```php
$array->fill($value [, $start [, $end]]);
```

#### Parameters
- ***`$value`***
    Value to fill the array with. (Note all elements in the array will be this exact value.)
- ***`$start`*** *(optional)*
    Start index, default 0.
- ***`$end`*** *(optional)*
    End index, default `$array->length`

#### Return Value
Modified `JsArray` instance filled with `$value`.

### # forEach
The `forEach()` method executes a callable function for each item of the array.

#### Example
```php
$array = new JsArray([1, 2, 3, 4]);
$array->forEach(
    function ($item, $index) {
        echo $index . " => " . $item . "\n";
    }
);

// Expected output:
// 0 => 1
// 1 => 2
// 2 => 3
// 3 => 4
```

#### Syntax
```php
$array->forEach($callback($item [, $index [, $key]]));
```

#### Parameters
- ***`$callback`***

    + ***`$item`***
        The current item being processed in the array.
    + ***`$index`*** (optional)
        A zero based index of the current item being processed in the array.
    + ***`$key`*** (optional)
        The key of the current item being processed in the array. This is useful for associative arrays.

#### Return Value
`NULL`

---
### # map
The `map()` method **creates a new array** populated by the user callback function on every element of the calling array. It keeps the original array untouched.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);
$binaryArray = $array->map(
    function ($item, $index) {
        return $item % 2;
    }
);

print_r($binaryArray);
// Expected output: JsArray [1, 0, 1, 0, 1]

// PHP >= 7.4 you can use arrow function.
$binaryArray = $array->map(fn($item, $index) => $item % 2);
// Output remains same.
```

#### Syntax
```php
$newArray = $array->map($callback($item [, $index [, $key]]));
```
#### Parameters
- ***`$callback`***
    This is a `callable` function which is executed on every element of the `$array` and the return value of the function is added to the `$newArray`.

    The `$callback` function takes one required and two optional arguments.

    + ***`$item`***
        The current item being processed in the array.
    + ***`$index`*** *(optional)*
        A zero based index of the current item being processed in the array.
    + ***`$key`*** *(optional)*
        The key of the current item being processed in the array. This is useful for associative arrays.

#### Return Value
A new `JsArray` instance after each item being processed by the callback function.
