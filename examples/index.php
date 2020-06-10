<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$arr = [1, 2, 3, 4, 5, 6];

$res = JsArray::bind($arr)->every(
	function ($item) {
		return $item < 6;
	}
);

$some = JsArray::some(
	function ($item) {
		return $item < 6;
	}
);

echo '<xmp>';
var_dump($res);
echo '</xmp>';
echo '<xmp>';
var_dump($some);
echo '</xmp>';
die();
