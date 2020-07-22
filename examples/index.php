<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ahamed\JsPhp\JsArray;
$array = new JsArray([
	'name' => 'John Doe',
	'email' => 'john@example.com',
	'age' => 24,
	'gender' => 'male'
]);

$array['name'] = 'Alice Bob';
$array['phone'] = "123445";

foreach ($array as $key => $value)
{
	echo $key . " => " . $value . "\n";
}
