<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$array = new JsArray(['one' => 1, 'two' => 2, 'three' => 3, 'four' => ['file' => 'file.php']]);


echo '<xmp>';
print_r($array);
echo '</xmp>';
die();

