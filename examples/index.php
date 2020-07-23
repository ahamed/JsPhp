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

$array = new JsArray(['name' => 'sajeeb', 'age' => 26]);

$object = new JsObject(
	[
		'name' => 'John Doe',
		'age' => 24
	]
);

$object['age'] = 45;

unset($object->age);

echo '<xmp>';
print_r(($object));
var_dump(isset($object['age']));
echo '</xmp>';
die();

