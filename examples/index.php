<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = [
	'four' => 4,
	'two' => 2,
	'three' => 3,
	'four' => 4,
	'five' => 5,
	'one' => 1,
	'six' => 6
];

$array = new JsArray($data);

$array->sort();

echo '<xmp>';
print_r($array);
echo '</xmp>';
die();


