<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ahamed\JsPhp\JsArray;
$array = new JsArray([1, 2, 3, 4, 5]);
$slice = $array->slice(10);
print_r($slice);

