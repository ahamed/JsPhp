<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

// $array = [1, 2, 3, 4];
$array = ['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5];

JsArray::bind($array);

// JsArray::forEach(
// 	function ($item, $index) {
// 		print_r($index . ' => ' . $item . "\n");
// 	}
// );

// $newArr = JsArray::map(
// 	function ($item, $index) {
// 		return $item * $item + $index;
// 	}
// );

$filteredArr = JsArray::filter(
	function ($item, $index) {
		return strlen($item) <= 3;
	},
	true
);

echo '<xmp>';
print_r($filteredArr);
echo '</xmp>';
die();
