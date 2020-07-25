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

$object = new JsObject(['name' => 'Sajeeb', 'age' => 24]);
$keys = JsObject::keys($object)->map(
	function ($key) use ($object) {
		return $object->$key;
	}
);

echo '<xmp>';
print_r($keys);
echo '</xmp>';
die();


// echo '<xmp>';
// print_r($deep);
// echo '</xmp>';
// die();

