<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Core\Interfaces;

/**
 * JavaScript into PHP core Interface
 *
 * @since   1.0.0
 */
interface JsPhpCoreInterface
{
	/**
	 * The bind function to store the element
	 * i.e. the array|object|string for being modification
	 *
	 * @param   mixed	$elements    	The element in which the methods will be applied.
	 * @param	boolean	$makeMutable	If true then bind will mutate the array, Otherwise it will create a new array.
	 *
	 * @return  void
	 * @since   1.0.0
	 */
	public function bind($elements, $makeMutable = true);

	/**
	 * Check the elements is valid or not.
	 *
	 * @param	mixed	$elements	The elements to check.
	 *
	 * @return	bool	The checked result. True if the elements are valid, false otherwise.
	 * @since	1.0.0
	 */
	public function check($elements) : bool;

	/**
	 * Reset the elements
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function reset();

	/**
	 * Get elements
	 *
	 * @return	array|object|string
	 * @sine	1.0.0
	 */
	public function get();
}
