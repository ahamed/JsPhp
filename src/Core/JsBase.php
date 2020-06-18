<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Core;

use Ahamed\JsPhp\Core\Interfaces\JsPhpCoreInterface;

/**
 * JavaScript base functionalities
 * This is a common class which extends all the helpers
 *
 */
class JsBase implements JsPhpCoreInterface
{
	/**
	 * Elements variable.
	 *
	 * @var		array|object|string		The element(s) to be modified.
	 *
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
	 * Bind the elements which are being modified
	 *
	 * @param	array|object|string		$elements		The elements are being modified
	 * @param	boolean					$makeMutable	If true then bind will mutate the array, Otherwise it will create a new array.
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function bind($elements, $makeMutable = true)
	{
		if (!isset($elements))
		{
			$calledByClass = \get_called_class();
			$type = ltrim(explode("\\", $calledByClass)[count(explode("\\", $calledByClass)) - 1], 'Js');

			throw new \UnexpectedValueException(\sprintf('You have to pass a non empty %s as a parameter', $type));
		}

		if (!(\is_array($elements)
			|| \is_object($elements)
			|| \is_string($elements)))
		{
			throw new \UnexpectedValueException(\sprintf('Invalid data provided. You just allowed to use %s', $type));
		}

		if ($makeMutable)
		{
			$this->elements = $elements;
		}
	}

	/**
	 * Reset the elements to null
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function reset()
	{
		$this->elements = null;
	}

	/**
	 * Check if the given callback function is a callable.
	 * If not then throw an exception.
	 *
	 * @param	func	$callback	The callback function.
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

	/**
	 * Check if the bind value is valid or not.
	 * If the bind value i.e the elements are invalid then
	 * throw errors.
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	protected function check()
	{
		$calledByClass = \get_called_class();
		$type = ltrim(explode("\\", $calledByClass)[count(explode("\\", $calledByClass)) - 1], 'Js');

		if (!isset($this->elements))
		{
			throw new \Exception(\sprintf('You have to bind your %s first.', $type));
		}

		switch ($type)
		{
			case 'Array':
				if (!\is_array($this->elements))
				{
					throw new \TypeError(\sprintf('You must have to bind an %s.', $type));
				}
			break;
			case 'Object':
				if (!\is_object($this->elements))
				{
					throw new \TypeError(\sprintf('You must have to bind an %s.', $type));
				}
			break;
			case 'String':
				if (!\is_string($this->elements))
				{
					throw new \TypeError(\sprintf('You must have to bind an %s.', $type));
				}
			break;
		}
	}

	/**
	 * Get elements. This is not directly called with the class
	 * but can call with any chaining method.
	 *
	 * @return	array|object|string
	 * @since	1.0.0
	 */
	public function get()
	{
		return $this->elements;
	}
}
