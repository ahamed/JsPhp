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
	 * @param   array|object|string     $elements    The element in which the methods will be applied.
	 *
	 * @return  self
	 * @since   1.0.0
	 */
	public static function bind($elements);

	/**
	 * Reset the elements
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public static function reset();

	/**
	 * Get elements
	 *
	 * @return	array|object|string
	 * @sine	1.0.0
	 */
	public function get();

}
