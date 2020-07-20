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
* [# forEach](#-foreach)
    * [Example](#example-2)
    * [Syntax](#syntax-2)
    * [Parameters](#parameters-2)
    * [Return Value](#return-value-2)
* [# map](#-map)
    * [Example](#example-3)
    * [Syntax](#syntax-3)
    * [Parameters](#parameters-3)
    * [Return Value](#return-value-3)
</details>

### Why this library?
While using ***php*** *Array/Object/String* methods it feels troublesome because of their unstructured patterns.

For an example, say you are using the `array_map` and the `array_filter` methods of *php*. At the time of using, you may notice that for the `array_map` method, the `$callback` comes first then the `$array` but for the `array_filter` method, the `$array` comes first then the `$callback`. And this mis-structure exists everywhere.

Then I've discovered that the **JavaScript** uses a good pattern for these cases and I am also a big fan of JavaScript. Thats why, I've decided to build this library. I can say that the JavaScript lovers can get the pure feelings of JavaScript by using this and the JavaScript non-lovers also get advantage of good structure of *array/object/string* manipulations.

### Installation
Installation is very simple. Open your terminal at the project root directory and run-
```console
composer require ahamed/jsphp
```

### Usage
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
___

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

___

### # fill
The `fill()` method changes all elemenents by a static value within a range `[$start, $end)`. The `$start` is zero based index number and the `end` is also zero based index number but the `$end` index does not change. I.e. the `$end` is exclusive.
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

___ 

### # filter
The `filter()` method **creates a new array** with all elements that pass the user provided function. If you apply the filter method to an associative array then it automatically preserves the `keys` of the array. If the array is a hybride array i.e. it contains both numeric keys and string keys then it preserves the string keys but the numeric keys will be rebased from zero.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5, 6]);
$evenNumbers = $array->filter(
    function ($item) {
        return $item % 2 === 0;
    }
);
print_r($evenNumbers);
// Expected output: JsArray [2, 4, 6]

// Associative array example
$array = new JsArray(['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4]);
$filtered = $array->filter(
	function ($item, $index, $key) {
		return strlen($key) >= 4;
	}
);
print_r($filtered);
// Expected output: JsArray ['three' => 3, 'four' => 4]

// Hybrid array exmample
$array = new JsArray(['one' => 1, 'two' => 2, 3, 4, 'five' => 5, 6]);
$filtered = $array->filter(
	function ($item) {
		return $item > 1;
	}
);
print_r($filtered);
// Expected output: JsArray ['two' => 2, 3, 4, 'five' => 5, 6]
// This is actually ['two' => 2, '0' => 3, '1' => 4, 'five' => 5, '2' => 6]
```

#### Syntax
```php
$filteredArray = $array->filter($callback($item [, $index [, $key]]));
```

#### Parameters
- ***`$callback`***
    The user defined callback function which runs for every element. If this function returns `True` then the element is kept, otherwise the element is skipped.
    + ***`$item`***
        The current element being processed in the array.
    + ***`$index`*** *(optional)*
        The zero based index number of the current processing element.
    + ***`$key`*** *(optional)*
        The key of the current processing element.

#### Return Value
`JsArray` instance with filtered elements.

___

### # find
The `find()` method returns the value of the first element in the provided array that satisfied the user provided callback function. If it fails to find any value then it returns `NULL`

#### Example
```php
$array = new JsArray([1, 2, 3, 2, 5, 5]);
$findValue = $array->find(
    function ($item) {
        return $item === 2;
    }
);
print_r($findValue);
// Expected output: 2

// With php >= 7.4 arrow function
$nonExistingValue = $array->find(fn($item) => $item === 20);
print_r($nonExistingValue);
// Expected output: NULL
```

#### Syntax
```php
$findValue = $array->find($callback($item [, $index [, $key]]));
```

#### Parameters
- ***`$callback`***
    Function to execute to each element of the array. It has one required and two optional arguments.
    + ***`$item`***
        The current Element of the array.
    + ***`$index`*** *(optional)*
        The zero based index of the current element of the array.
    + ***`$key`*** *(optional)*
        The key of the current element of the array.

#### Return Value
The value of the first element that is found by satisfying the user defined callback function. If no value found then `NULL` returns.

___

### # findIndex
The `findIndex()` method returns the index of the first element in the provided array that satisfied the user provided callback function. If it fails to find any value then it returns `-1`

#### Example
```php
$array = new JsArray([1, 2, 3, 2, 5, 5]);
$findValue = $array->findIndex(
    function ($item) {
        return $item === 2;
    }
);
print_r($findValue);
// Expected output: 1

// With php >= 7.4 arrow function
$nonExistingValue = $array->findIndex(fn($item) => $item === 20);
print_r($nonExistingValue);
// Expected output: -1
```

#### Syntax
```php
$findIndex = $array->findIndex($callback($item [, $index [, $key]]));
```

#### Parameters
- ***`$callback`***
    Function to execute to each element of the array. It has one required and two optional arguments.
    + ***`$item`***
        The current Element of the array.
    + ***`$index`*** *(optional)*
        The zero based index of the current element of the array.
    + ***`$key`*** *(optional)*
        The key of the current element of the array.

#### Return Value
The **index** of the first element that is found by satisfying the user defined callback function. If no value found then `-1` returns.

___

### # findLastIndex
The `findLastIndex()` method returns the index of the last element in the provided array that satisfied the user provided callback function. If it fails to find any value then it returns `-1`

#### Example
```php
$array = new JsArray([1, 2, 3, 2, 5, 5]);
$findValue = $array->findLastIndex(
    function ($item) {
        return $item === 2;
    }
);
print_r($findValue);
// Expected output: 3

// With php >= 7.4 arrow function
$nonExistingValue = $array->findLastIndex(fn($item) => $item === 20);
print_r($nonExistingValue);
// Expected output: -1
```

#### Syntax
```php
$findIndex = $array->findLastIndex($callback($item [, $index [, $key]]));
```

#### Parameters
- ***`$callback`***
    Function to execute to each element of the array. It has one required and two optional arguments.
    + ***`$item`***
        The current Element of the array.
    + ***`$index`*** *(optional)*
        The zero based index of the current element of the array.
    + ***`$key`*** *(optional)*
        The key of the current element of the array.

#### Return Value
The **index** of the last element that is found by satisfying the user defined callback function. If no value found then `-1` returns.
___

### # flat
The `flat()` method creates a new array with all sub-array elements recursively concatenated into it. It converts multi-dimentional array into one-dimentional array.

#### Example
```php
$array = new JsArray([1, 2, [3, 4, [5, 6], 7, 8]]);
$flatArray = $array->flat();
print_r($flatArray);
// Expected output: JsArray [1, 2, 3, 4, 5, 6, 7, 8]
```

#### Syntax
```php
$flatArray = $array->flat();
```

#### Parameters
No parameter for this method

#### Return Value
`JsArray` instance with flatten one-dimentional array.

___

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
___

### # includes
The `includes()` method determines whether an array includes a certain value among its entries, returning `true` or `false` as appropriate. This checks a loose equitiy for finding the value and for string it's case sensetive.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5, 6]);
$hasValue = $array->includes(3);
print_r($hasValue);
// Expected output: true

$hasNonExistingValue = $array->includes(2, 2);
print_r($hasNonExistingValue);
// Expected output: false
```

#### Syntax
```php
$hasValue = $array->includes($item [, $fromIndex]);
```

#### Parameters
- ***`$item`***
    The item to find.
- ***`$fromIndex`*** *(optional)*
    From which position finding starts. If this is omitted then searching begins from the index 0. If the `$fromIndex` is negative then its calculated like `$length + $fromIndex`. The `$fromIndex` value always lays within the range `[0, $length]`.

#### Return Value
`Boolean`, `True` if the value included on the array, `False` otherwise.
___

### # indexOf
The `indexOf()` method returns the first index at which a given element can be found in the array, or -1 if it is not present.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5, 6]);
$position = $array->indexOf(4);
print_r($position);
// Exptected output: 3

$notFoundingPosition = $array->indexOf(2, 3);
print_r($notFoundingPosition);
// Expected output: -1
```

#### Syntax
```php
$position = $array->indexOf($item [, $fromIndex]);
```

#### Parameters
- ***`$item`***
    The item to find.
- ***`$fromIndex`*** *(optional)*
    From which position finding starts. If this is omitted then searching begins from the index 0. If the `$fromIndex` is negative then its calculated like `$length + $fromIndex`. The `$fromIndex` value always lays within the range `[0, $length]`.

#### Return Value
`Integer`, The index of the searcing item. The index is zero based and if the item is not found then returns `-1`.
___

### # join
The `join()` method creates and returns a new string by concatenating all of the elements in an array, separated by commas or a specified separator string. If the array has only one item, then that item will be returned without using the separator.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5, 6]);
$str = $array->join();
print_r($str);
// Expected output: "1,2,3,4,5,6"

$str = $array->join(' + ');
print_r($str);
// Expected output: "1 + 2 + 3 + 4 + 5 + 6"
```

#### Syntax
```php
$str = $data->join([$separator]);
```

#### Parameters
- ***`$separator`*** *(optional)*
    Specifies a string to separate each pair of adjacent elements of the array. If omitted, the array elements are separated with a comma (","). If separator is an empty string, all elements are joined without any characters in between them.

#### Return Value
`String`, the string after joining the array elements with the help of `$separator`.

___

### # keys
The `keys()` method creates a new array with the keys of the array.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);
$keys = $array->keys();
print_r($keys);
// Expected output: JsArray [0, 1, 2, 3, 4]

$assocArray = new JsArray(['one' => 1, 'two' => 2, 'three' => 3]);
$keys = $assocArray->keys();
print_r($keys);
// Expected output: JsArray ['one', 'two', 'three']
```

#### Syntax
```php
$keys = $array->keys();
```

#### Parameters
No parameter for this method.

#### Return Value
`JsArray` instance with the keys of the provided array. It allows chaining.

___

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