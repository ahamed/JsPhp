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
* [Documentation](#documentation)
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
        * [# filter](#-filter)
            * [Example](#example-3)
            * [Syntax](#syntax-3)
            * [Parameters](#parameters-3)
            * [Return Value](#return-value-3)
        * [# find](#-find)
            * [Example](#example-4)
            * [Syntax](#syntax-4)
            * [Parameters](#parameters-4)
            * [Return Value](#return-value-4)
        * [# findIndex](#-findindex)
            * [Example](#example-5)
            * [Syntax](#syntax-5)
            * [Parameters](#parameters-5)
            * [Return Value](#return-value-5)
        * [# findLastIndex](#-findlastindex)
            * [Example](#example-6)
            * [Syntax](#syntax-6)
            * [Parameters](#parameters-6)
            * [Return Value](#return-value-6)
        * [# flat](#-flat)
            * [Example](#example-7)
            * [Syntax](#syntax-7)
            * [Parameters](#parameters-7)
            * [Return Value](#return-value-7)
        * [# forEach](#-foreach)
            * [Example](#example-8)
            * [Syntax](#syntax-8)
            * [Parameters](#parameters-8)
            * [Return Value](#return-value-8)
        * [# includes](#-includes)
            * [Example](#example-9)
            * [Syntax](#syntax-9)
            * [Parameters](#parameters-9)
            * [Return Value](#return-value-9)
        * [# indexOf](#-indexof)
            * [Example](#example-10)
            * [Syntax](#syntax-10)
            * [Parameters](#parameters-10)
            * [Return Value](#return-value-10)
        * [# join](#-join)
            * [Example](#example-11)
            * [Syntax](#syntax-11)
            * [Parameters](#parameters-11)
            * [Return Value](#return-value-11)
        * [# keys](#-keys)
            * [Example](#example-12)
            * [Syntax](#syntax-12)
            * [Parameters](#parameters-12)
            * [Return Value](#return-value-12)
        * [# map](#-map)
            * [Example](#example-13)
            * [Syntax](#syntax-13)
            * [Parameters](#parameters-13)
            * [Return Value](#return-value-13)
        * [# pop](#-pop)
            * [Example](#example-14)
            * [Syntax](#syntax-14)
            * [Parameters](#parameters-14)
            * [Return Value](#return-value-14)
        * [# push](#-push)
            * [Example](#example-15)
            * [Syntax](#syntax-15)
            * [Parameters](#parameters-15)
            * [Return Value](#return-value-15)
        * [# reduce](#-reduce)
            * [Example](#example-16)
            * [Syntax](#syntax-16)
            * [Parameters](#parameters-16)
            * [Return Value](#return-value-16)
        * [# reverse](#-reverse)
            * [Example](#example-17)
            * [Syntax](#syntax-17)
            * [Parameters](#parameters-17)
            * [Return Value](#return-value-17)
        * [# shift](#-shift)
            * [Example](#example-18)
            * [Syntax](#syntax-18)
            * [Parameters](#parameters-18)
            * [Return Value](#return-value-18)
        * [# slice](#-slice)
            * [Example](#example-19)
            * [Syntax](#syntax-19)
            * [Parameters](#parameters-19)
            * [Return Value](#return-value-19)
        * [# some](#-some)
            * [Example](#example-20)
            * [Syntax](#syntax-20)
            * [Parameters](#parameters-20)
            * [Return Value](#return-value-20)
         * [# sort](#-sort)
            * [Example](#example-21)
            * [Syntax](#syntax-21)
            * [Parameters](#parameters-21)
            * [Return Value](#return-value-21)
         * [# splice](#-splice)
            * [Example](#example-22)
            * [Syntax](#syntax-22)
            * [Parameters](#parameters-22)
            * [Return Value](#return-value-22)
</details>

### Why this library?
While using ***php*** **Array** methods it feels troublesome because of their unstructured patterns.

For example, you are using the `array_map` and the `array_filter` methods of *php*. At the time of using, you may notice that for the `array_map` method, the `$callback` comes as the first parameter of the method, then the `$array` but for the `array_filter` method, the `$array` comes first then the `$callback`. And this mixed structure exists everywhere.

Then I've discovered that the **JavaScript** uses a good pattern for these cases and I am also a big fan of JavaScript. That's why I've decided to build this library. I can say that the JavaScript lovers can get the pure feelings of JavaScript by using this and the JavaScript non-lovers also get the advantage of the good structure of **array** manipulations.

### Installation
`composer` is needed for installing the package. If you have composer installed then run the command.

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
# Documentation
> For writing this documentation I've followed the [MDN](https://developer.mozilla.org/en-US/) a lot. Thanks to **MDN**, this site helps me to learn a lot of JS.

## Array Methods
Here I cover most of the useful array methods. We now learn them one by one. These methods are documented in alphabetical order.

>Before performing any array operations you have to pass the array to the `JsArray` constructor i.e. you have to create an `JsArray` instance with the native *php* array for performing array operations, like- `$array = new JsArray([1, 2, 3, 4]);`


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
- ***`$valueN`*** *(optional)*
    Arrays and/or scalar values to concatenate into a new array. If all *`$valueN`* parameters are omitted then `concat` returns the copy of the original array.

#### Return Value
A new `JsArray` instance with concatenated elements.
___

### # every
The `every()` method tests whether all items in the array pass the test implemented by the user callback function.

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

// Using php >= 7.4 Arrow Function
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

___ 

### # filter
The `filter()` method **creates a new array** with all elements that pass the user provided function. If you apply the filter method to an associative array then it automatically preserves the `keys` of the array. If the array is a hybrid array i.e. it contains both numeric keys and string keys then it preserves the string keys but the numeric keys will be rebased from zero.

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

// Hybrid array example
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
The `flat()` method creates a new array with all sub-array elements recursively concatenated into it. It converts multi-dimensional array into one-dimensional array.

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
`JsArray` instance with flatten one-dimensional array.

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
The `includes()` method determines whether an array includes a certain value among its entries, returning `true` or `false` as appropriate. This checks a loose equity for finding the value and for string it's case sensitive.

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
// Expected output: 3

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
`Integer`, The index of the searching item. The index is zero based and if the item is not found then returns `-1`.
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
___

### # pop
The `pop()` method removes the last element from an array and returns this element. This method changes the original array.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);
$removed = $array->pop();
print_r($removed);
// Expected output: 5

print_r($array);
// Expected output: JsArray [1, 2, 3, 4]
```

#### Syntax
```php
$removed = $array->pop();
```

#### Parameters
No parameter for this method.

#### Return Value
The removed element from the array.

___

### # push
The `push()` method adds a new element at the end of an array. This method changes the original array.

#### Example
```php
$array = new JsArray([1, 2, 3, 4]);
$length = $array->push(5);
print_r($length);
// Expected output: 5

print_r($array);
// Expected output: JsArray [1, 2, 3, 4, 5]

$newLength = $array->push(5, 6, 8);
print_r($newLength);
// Expected output: 8

print_r($array);
// Expected output: JsArray [1, 2, 3, 4, 5, 6, 7, 8]
```

#### Syntax
```php
$length = $array->push([$item1 [, ...[, $itemN]]);
```

#### Parameters
-***`$itemN`***
    The item(s) to add to the end of the array.

#### Return Value
`Integer`, The length of the array after pushing the items.

___ 

### # reduce
The `reduce()` method executes a reducer function (that you provide) on each element of the array, resulting in single output value.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);
$sum = $array->reduce(
    function($acc, $curr) {
        return $acc + $curr;   
    },
    0
);
print_r($sum);
// Expected output: 15

// Using php >= 7.4 arrow function
$sum = $array->reduce(fn($acc, $curr) => $acc + $curr, 0);
print_r($sum);
// Expected output: 15
```

#### Syntax
```php
$result = $array->reduce($callback($accumulator, $currentValue [, $index [, $key]])[, $initial]);
```

#### Parameters
- ***`$callback`***
    The user defined callback function which is executed for every element (except for the first if no `$initial` value is given) of the array. It takes two required and two optional arguments.
    + ***`$accumulator`***
        The accumulator accumulates callback's return values. It is the accumulated value previously returned in the last invocation of the callback—or `$initial` value, if it was supplied (see below).
    + ***`$currentValue`***
        The current element being processed in the array.
    + ***`$index`*** *(optional)*
        The index of the current element being processed in the array. Starts from index 0 if an `$initial` value is provided. Otherwise, it starts from index 1.
    + ***`$key`*** *(optional)*
        The key of the current element being processed in the array. Starts from index 0 key if an `$initial` value is provided. Otherwise, it starts from index 1 key.
- ***`$initial`*** *(optional)*
    A value to use as the first argument to the first call of the callback. If no `$initial` value is supplied, the first element in the array will be used as the initial accumulator value and skipped as `$currentValue`.

#### Return Value
The single value that results from the reduction. If the returned value is an array then the array converted into an instance of `JsArray` for chaining.
__

### # reverse
The `reverse()` method reverses an array [in place](https://en.wikipedia.org/wiki/In-place_algorithm). The first array element becomes the last, and the last array element becomes the first.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);
$array->reverse();

print_r($array);
// Expected output: JsArray [5, 4, 3, 2, 1]
```

#### Syntax
```php
$array->reverse();
```

#### Parameters
No parameter for this method.

#### Return Value
The reversed array. The array is also an instance of `JsArray` for chaining.

___

### # shift
The `shift()` method removes the first element from an array and returns that removed element. This method changes the original array.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);
$removed = $array->shift();

print_r($removed);
// Expected output: 1

print_r($array);
// Expected output: JsArray [2, 3, 4, 5]
```

#### Syntax
```php
$removed = $array->shift();
```

#### Parameters
No parameter for this method.

#### Return Value
The removed element from the array; `NULL` if the array is empty.

___

### # slice
The `slice()` method returns a copy of a portion of an array into a new array selected from the range `[$start to $end)` (`$end` not included) where `$start` and `$end` represent the index of items in that array. The original array will not be modified.

#### Example
```php
$array = new JsArray([1, 2, 3, 4, 5]);
$sliced = $array->slice(1, 4);

print_r($sliced);
// Expected output: JsArray [2, 3, 4]

$sliced = $array->slice(-3);
print_r($sliced);
// Expected output: JsArray [3, 4, 5]
```

#### Syntax
```php
$sliced = $array->slice([$start [, $end]]);
```

#### Parameters
- ***`$start`*** *(optional)*
    Zero-based index at which to start extraction.
    A negative index can be used, indicating an offset from the end of the sequence. `slice(-2)` extracts the last two elements in the sequence.

    If `$start` is `NULL` or empty, slice starts from the index 0.

    If `$start` is greater than the index range of the sequence, an empty array is returned.
- ***`$end`*** *(optional)*
    Zero-based index before which to end extraction. slice extracts up to but not including end. For example, `slice(1, 4)` extracts the second element through the fourth element (elements indexed 1, 2, and 3).

    A negative index can be used, indicating an offset from the end of the sequence. `slice(2,-1)` extracts the third element through the second-to-last element in the sequence.

    If `$end` is omitted, slice extracts through the end of the sequence `($array->length)`.

    If `$end` is greater than the length of the sequence, slice extracts through to the end of the sequence `($array->length)`.

#### Return Value
A new `JsArray` instance containing the extracted elements.

___

### # some
The `some()` method tests whether at least one element in the array passes the test implemented by the user provided callback function. It returns a Boolean value.

#### Example
```php
$array = new JsArray(['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4]);
$passed = $array->some(
    function ($item, $index, $key) {
        return strlen($key) > 4;
    }
);
var_dump($passed);
// Expected output: bool(true)

// Using php >= 7.4 arrow function
$notPassed = $array->some(fn($item, $index, $key) => strlen($key) < 3);
var_dump($notPassed);
// Expected output: bool(false)
```

#### Syntax
```php
$passed = $array->some($callback($item [, $index [, $key]]));
```

#### Parameters
- ***`$callback`***
    A function to test for each element, taking three arguments:
    + ***`$item`***
        The current element being processed in the array.
    + ***`$index`*** *(optional)*
        The index of the current element being processed in the array.
    + ***`$key`*** *(optional)*
        The key of the current element being processed in the array.

#### Return Value
`true` if the `$callback` function returns a truthy value for at least one element in the array. Otherwise, `false`.

___

### # sort
The `sort()` method sorts the elements of an array in place and returns the sorted array. The default sort order is ascending. Currently, the sort has been done by using `merge` sort implementation.


#### Example
```php
$array = new JsArray([2, 4, 2, 1, 6, 7, 9]);
$array->sort();
print_r($array);
// Expected output: JsArray [1, 2, 2, 4, 6, 7, 9]

// Sort descending order
$array = new JsArray([2, 4, 2, 1, 6, 7, 9]);
$array->sort(
    function ($a, $b) {
        return $b - $a;
    }
);
print_r($array);
// Expected output: JsArray [9, 7, 6, 4, 2, 2, 1]
```

#### Syntax
```php
$array->sort([$callback($firstEl, $secondEl)]);
```

#### Parameters
- ***`$callback`***
    Specifies a function that defines the sort order. If it is omitted then the elements are sorted in ascending order.

    + ***`$firstEl`***
        The first element for comparison.
    + ***`$secondEl`***
        The second element for comparison.

#### Return Value
The original `JsArray` instance with sorted data. This method changes the original array.

___

### # splice
The `splice()` method changes the contents of an array by removing or replacing existing elements and/or adding new elements in place.

#### Example
```php
$array = new JsArray(['mango', 'orange', 'banana']);
$deletedItems = $array->splice(1, 1);
print_r($deletedItems);
// Expected output: JsArray ['orange']

print_r($array);
// Expected output: JsArray ['mango', 'banana']

// Insert new item without deleting
$delete = $array->splice(0, 0, 'lemon', 'apple');
print_r($array);
// Expected output: JsArray ['lemon', 'apple', 'mango', 'banana']

print_r($delete);
// Expected output: JsArray []
```

#### Syntax
```php
$deletedItems = $array->splice([$start [, $deleteCount [, $item1 [, ...[, $itemN]]]]]);
```

#### Parameters
-***`$start`*** *(optional)*
    The index at which to start changing the array.
    If greater than the length of the array, start will be set to the length of the array. In this case, no element will be deleted but the method will behave as an adding function, adding as many element as item[n*] provided.
    If negative, it will begin that many elements from the end of the array. (In this case, the origin -1, meaning -n is the index of the nth last element, and is therefore equivalent to the index of `$array->length - n`.)
    If `$array->length + $start` is less than 0, it will begin from index 0.

-***`$deleteCount`*** *(optional)*
    An integer indicating the number of elements in the array to remove from `$start`.
    If `$deleteCount` is omitted, or if its value is equal to or larger than `$array->length - $start` (that is, if it is equal to or greater than the number of elements left in the array, starting at start), then all the elements from start to the end of the array will be deleted.

-***`$itemN`*** *(optional)*
    The elements to add to the array, beginning from `$start`. If you do not specify any elements, `splice()` will only remove elements from the array.

#### Return Value
An instance of `JsArray` with the deleted items.