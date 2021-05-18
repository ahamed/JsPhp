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

### Future Journey
Currently I've covered only the `array` methods. In near future I will add the `object` and `string` methods.

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

Follow the wiki pages for the details documentation.
+ [JsArray](https://github.com/ahamed/JsPhp/wiki/JsArray)
+ [JsObject](https://github.com/ahamed/JsPhp/wiki/JsObject)



### Testing
You can run `PHPUnit` testing and `PHP_CodeSniffer`.
- For running unit test
    ```console
    composer run-script test
    ```
- For running phpcs test
    ```console
    composer run-script phpcs
    ```
