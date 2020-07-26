<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits\Objects;

use Ahamed\JsPhp\JsArray;
use Ahamed\JsPhp\JsObject;

/**
 * Trait function for array conditionals
 *
 * @since   1.0.0
 */
trait FactoryTrait
{
	/**
	 * Static method for getting the keys of an object.
	 *
	 * @param	mixed	$object		The object elements for which the keys return.
	 *
	 * @return	JsArray	An instance of JsArray with the keys.
	 * @since	1.0.0
	 */
	public static function keys($object)
	{
		$instance = new JsObject($object);
		$elements = $instance->get();
		$keys = array_keys(\get_object_vars($elements));

		return new JsArray($keys);
	}

	/**
	 * Static method for getting the values of an object.
	 *
	 * @param	mixed	$object		The object elements for which the values return.
	 *
	 * @return	JsArray	An instance of JsArray with the values.
	 * @since	1.0.0
	 */
	public static function values($object)
	{
		$instance = new JsObject($object);
		$elements = $instance->get();
		$values = array_values(\get_object_vars($elements));

		return new JsArray($values);
	}

	/**
	 * Get entries of an object. The entries is the array of [key, value] pair.
	 *
	 * @param	array|object|JsObject	$object		The object for which we get the entries.
	 *
	 * @return	JsArray		The entries array.
	 * @since	1.0.0
	 */
	public static function entries($object)
	{
		$instance = new JsObject($object);
		$elements = $instance->get();

		$vars = \get_object_vars($elements);
		$keys = array_keys($vars);
		$values = array_values($vars);
		$entries = [];

		for ($i = 0, $length = count($keys); $i < $length; ++$i)
		{
			$entries[] = [$keys[$i], $values[$i]];
		}

		return new JsArray($entries);
	}
}
