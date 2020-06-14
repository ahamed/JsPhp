<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../bootstrap.php';

use Ahamed\JsPhp\JsArray;

$data = new JsArray([1, 2, 3]);

// $assoc = new JsArray(['m1' => 'Jan', 'm2' => 'Feb', 'm3' => 'Mar']);
// $assoc->pop();

$val = $data->unshift(0, -1, -2);
// $val = $data->unshift(-1);
// $val = $data->unshift(-2);

echo '<xmp>';
print_r($data);
print_r($val);
echo '</xmp>';
die();

