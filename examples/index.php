<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = new JsArray([[1, 3, 4], [5, 6]]);

$val = $data->find(
	function ($item) {
		return $item->find(
			function ($inner) {
				return $inner === 6;
			}
		);
	}
);

echo '<xmp>';
print_r($data);
print_r($val);
echo '</xmp>';
die();

