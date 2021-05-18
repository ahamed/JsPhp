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

$a = new JsObject(['name' => 'john', 'age' => 34]);
$b = new JsObject(['gender' => 'male', 'name' => 'alice', 6, 7]);

$c = JsObject::assign([2, 3], [4, 5]);
echo '<xmp>';
print_r($c);
echo '</xmp>';
die();


