<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Core;

/**
 * Final class `Store` for keeping the data
 *
 * @since   1.0.0
 */
final class Store
{
	/**
	 * Elements to store
	 *
	 * @var		array|object|string		The element to store
	 * @since	1.0.0
	 */
	private $elements = null;

	/**
	 * Constructor function of the Store class.
	 *
	 * @param	array|object|string		$elements	The data to store
	 *
	 * @since	1.0.0
	 */
	public function __construct($elements)
	{
		$this->elements = $elements;
	}

	/**
	 * Get the data elements
	 *
	 * @return	array|object|string
	 * @since	1.0.0
	 */
	public function getData()
	{
		return $this->elements;
	}

	/**
	 * Mutate the elements value without the constructor function.
	 *
	 * @param	array|object|string		$elements	The elements to set.
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function mutate($elements)
	{
		$this->elements = $elements;
	}
}
