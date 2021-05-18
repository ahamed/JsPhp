![BannerWithImageAndText](https://user-images.githubusercontent.com/5783354/87884417-03402d80-ca30-11ea-8fdc-5df12ca0e0aa.png)
<br>


![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/ahamed/JsPhp?labelColor=black&color=4ec428) ![GitHub](https://img.shields.io/github/license/ahamed/JsPhp?labelColor=black&color=4fc529) ![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/ahamed/JsPhp/PHP%20Composer/master?labelColor=black) ![GitHub issues](https://img.shields.io/github/issues/ahamed/JsPhp?color=c50a16&labelColor=black) ![GitHub closed issues](https://img.shields.io/github/issues-closed/ahamed/JsPhp?labelColor=black) ![GitHub pull requests](https://img.shields.io/github/issues-pr/ahamed/JsPhp?color=c50a16&labelColor=black) ![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed/ahamed/JsPhp?labelColor=black) ![GitHub language count](https://img.shields.io/github/languages/count/ahamed/JsPhp?labelColor=black) ![GitHub top language](https://img.shields.io/github/languages/top/ahamed/JsPhp?labelColor=black) ![GitHub repo size](https://img.shields.io/github/repo-size/ahamed/JsPhp?labelColor=black) ![GitHub All Releases](https://img.shields.io/github/downloads/ahamed/JsPhp/total?labelColor=black) ![GitHub contributors](https://img.shields.io/github/contributors/ahamed/JsPhp?labelColor=black) ![GitHub last commit](https://img.shields.io/github/last-commit/ahamed/JsPhp?labelColor=black) ![GitHub Release Date](https://img.shields.io/github/release-date/ahamed/JsPhp?labelColor=black) ![GitHub release (latest by date including pre-releases)](https://img.shields.io/github/v/release/ahamed/JsPhp?include_prereleases&labelColor=black) ![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/ahamed/JsPhp?labelColor=black)

![Packagist Version](https://img.shields.io/packagist/v/ahamed/JsPhp?labelColor=black) ![Packagist Downloads](https://img.shields.io/packagist/dm/ahamed/JsPhp?color=f18d1b&label=Packagist%20Downloads&labelColor=black) ![Packagist Stars](https://img.shields.io/packagist/stars/ahamed/JsPhp?labelColor=black)

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
