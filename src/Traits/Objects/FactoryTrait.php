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
}
