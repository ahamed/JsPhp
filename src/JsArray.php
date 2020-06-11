<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp;

use Ahamed\JsPhp\Core\JsBase;
use Ahamed\JsPhp\Traits\ArrayBasicsTrait;
use Ahamed\JsPhp\Traits\ArrayConditionalTrait;
use Ahamed\JsPhp\Traits\ArrayIteratorTrait;
use Ahamed\JsPhp\Traits\ArrayModifierTrait;
use Ahamed\JsPhp\Traits\ArraySearchingTrait;


/**
 * JsArray an abstract class gives the array methods
 *
 * @since   1.0.0
 */
class JsArray extends JsBase
{
	/**
	 * Import Array traits
	 */
	use ArrayBasicsTrait;
	use ArrayModifierTrait;
	use ArraySearchingTrait;
	use ArrayConditionalTrait;
	use ArrayIteratorTrait;

	/**
	 * Constructor function
	 *
	 * @param	array	$elements	The array of elements
	 *
	 * @since	1.0.0
	 */
	public function __construct($elements)
	{
		parent::__construct($elements);
	}

	/**
	 * Bind the elements which are being modified
	 *
	 * @param	array|object|string		$elements		The elements are being modified
	 * @param	boolean					$immutability	If true then bind will create a new copy of the elements, otherwise overwrite it.
	 *
	 * @return	self
	 * @since	1.0.0
	 */
	public function bind($elements, $immutability = true)
	{

		if ($immutability)
		{
			$instance = new $this($elements);
		}
		else
		{
			$instance = $this;
		}

		parent::bind($elements, $immutability);

		return $instance;
	}

	/**
	 * Get the length of the array
	 *
	 * @return	integer		The array length
	 * @since	1.0.0
	 */
	public function length()
	{
		$this->check();

		return count($this->get());
	}

	/**
	 * Check if the array is an associative array or sequential array.
	 *
	 * @param	array	$array	The array to check
	 *
	 * @return	boolean			True if is an associative array, False otherwise.
	 * @since	1.0.0
	 */
	public function isAssociativeArray($array)
	{
		if ([] === $array)
		{
			return false;
		}

		return array_keys($array) !== range(0, count($array) - 1);
	}

	/**
	 * Magic method __toString
	 *
	 * @return	string	Object echo message
	 * @since	1.0.0
	 */
	public function __toString()
	{
		return sprintf('For chaining method like map, filter, reduce, fill you have to call the function `get()` for getting the value.');
	}

	/**
	 * Magic method __debugInfo
	 *
	 * @return	string	Object echo message
	 * @since	1.0.0
	 */
	public function __debugInfo()
	{
		return [
			'message' => sprintf('For chaining method like map, filter, reduce, fill you have to call the function `get()` for getting the value.'),
			'data' => $this->get()
		];
	}
}
