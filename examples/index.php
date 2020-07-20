<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ahamed\JsPhp\JsArray;
$array = new JsArray(['two' => 2, 3, 4, 'five' => 5, 6]);
print_r($array);
