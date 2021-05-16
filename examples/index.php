<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Ahamed\JsPhp\JsArray;
use Ahamed\JsPhp\JsObject;


$range = fn($start, $end, $step) => JsArray::from(['length' => ($end-$start) / $step + 1], fn($_, $i) => $start + ($i * $step));
$array = JsArray::from('I love to play dota 2')->filter(fn($char) => $char !== ' ');

echo '<xmp>';
print_r($array);
echo '</xmp>';
die();

