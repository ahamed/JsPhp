<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = new JsArray([1, 3, 4, 5, 6, 3, 4, 5, 3, 2, 4]);
$index = $data->indexOf(3, -12);

echo '<xmp>';
print_r($data);
print_r($index);
echo '</xmp>';
die();

