<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = new JsArray([1, 2, 3, 4, 5]);

$isEvery = $data->every(
	function ($item) {
		return $item <= 5;
	}
);

echo '<xmp>';
var_dump($isEvery);
echo '</xmp>';
die();


