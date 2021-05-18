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

$obj = [
	'name' => 'Jon Doe',
	'age' => 24,
	'sex' => 'male',
	'email' => 'john@doe.com',
	'contact' => [
		'mobile' => '01xxxxxx',
		'phone' => '09xxxxx'
	],
	'password' => 'secret'
];
$object = new JsObject($obj);

$v = JsObject::fromEntries(JsObject::entries($object)->filter(fn($item) => $item[0] !== 'password'));

echo '<xmp>';
print_r($v);
echo '</xmp>';
die();


