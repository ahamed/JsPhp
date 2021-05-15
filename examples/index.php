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

$array = new JsArray(['I play dota', 'dota  is a good game']);
$mapped = $array->flatMap(fn($item) => explode(' ', $item))
	->filter(fn($item) => boolval($item));

echo '<xmp>';
print_r($mapped);
echo '</xmp>';
die();

