<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = ['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5, 'six' => 6];
$array = new JsArray($data);

$array2 = new JsArray([1, 2, 3]);

$spliced = $array2->splice();

echo '<xmp>';
print_r($spliced);
print_r($array2);
echo '</xmp>';
die();
