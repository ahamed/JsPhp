<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$arr = [1, 2, 3, 4, 3, 4, 3, 4, 4];
$arr2 = [
	[1, 2],
	[3, 4],
	[5, 6, 7]
];

$array = new JsArray($arr);
$array2 = $array->bind($arr2);

$val = $array->push(10, 11, 22, 33);

echo '<xmp>';
print_r($array);
echo '</xmp>';
die();


