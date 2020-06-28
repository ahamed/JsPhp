<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = ['one' => 1, 'two', 'three' => 3, 4, 5];
$array = new JsArray($data);

echo '<xmp>';
print_r($array);
print_r($array->reverse()->reverse());
echo '</xmp>';
die();

