<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = new JsArray;
$data->push(10, 20, 30);
$data->push(40);
$data->push(50);

echo '<xmp>';
print_r($data);
echo '</xmp>';
die();
