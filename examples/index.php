<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ahamed\JsPhp\JsArray;

$data = [
	'four' => 4,
	'two' => 2,
	3, 4,
	'3' => 5,
	'one' => 1,
	'six' => 6
];

$array = new JsArray($data);
$array->sort();

echo '<xmp>';
print_r($array);
echo '</xmp>';
die();


// $data = [1, 2, 3];
// $data2 = [4, [5, 6]];

// $array = new JsArray($data);
// $array2 = new JsArray($data2);
// $obj = new stdClass;
// $obj->name = 'John Doe';
// $obj->age = 24;

// $newData = $array->concat($array2, 200, 300, $obj);

// echo '<xmp>';
// print_r($newData);
// echo '</xmp>';
// die();


