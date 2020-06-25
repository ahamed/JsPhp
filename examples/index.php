<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = [1, 2, 3, 4, 5, 6];
$array = new JsArray($data);

$array->length = 1;
echo '<xmp>';
print_r($array);
echo '</xmp>';
die();

