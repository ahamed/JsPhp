<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Core;
/**
 * JavaScript base functionalities
 * This is a common class which extends all the helpers
 *
 */
class JsBase
{
	/**
	 * Elements variable.
	 *
	 * @var		array|object|string		The element(s) to be modified.
	 * @since	1.0.0
	 */
	protected $elements = null;

	/**
	 * Constructor function.
	 *
	 * @param	array|object|string		$elements	The input elements.
	 *
	 * @since	1.0.0
	 */
	public function __construct($elements)
	{
		$this->elements = $elements;
	}

	/**
	 * Check if the given callback function is a callable.
	 * If not then throw an exception.
	 *
	 * @param	callable	$callback	The callback function.
	 *
	 * @return	void
	 * @throws	InvalidArgumentException
	 * @since	1.0.0
	 */
	protected function isCallable($callback)
	{
		if (!\is_callable($callback))
		{
			$trace = debug_backtrace();
			$caller = $trace[1];
			$method = $caller['class'] . "\\" . $caller['function'] . "()";

			throw new \InvalidArgumentException(sprintf("The first parameter of \"%s\" must be a callable function", $method));
		}
	}
}
