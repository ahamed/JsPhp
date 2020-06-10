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
 * @since	1.0.0
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
	protected static $elements = null;

	/**
	 * Bind the elements which are being modified
	 *
	 * @param	array|object|string		$elements	The elements are being modified
	 *
	 * @return	self
	 * @since	1.0.0
	 */
	public static function bind($elements)
	{
		if (!empty($elements))
		{
			self::$elements = $elements;
		}
		else
		{
			$calledByClass = \get_called_class();
			$type = ltrim(explode("\\", $calledByClass)[count(explode("\\", $calledByClass)) - 1], 'Js');

			throw new \UnexpectedValueException(\sprintf('You have to pass a non empty %s as a parameter', $type));
		}

		return (new static);
	}

	/**
	 * Reset the elements to null
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public static function reset()
	{
		self::$elements = null;
	}

	/**
	 * Check if the bind value is valid or not.
	 * If the bind value i.e the elements are invalid then
	 * throw errors.
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	protected static function check()
	{
		$calledByClass = \get_called_class();
		$type = ltrim(explode("\\", $calledByClass)[count(explode("\\", $calledByClass)) - 1], 'Js');

		if (empty(self::$elements))
		{
			throw new \Exception(\sprintf('You have to bind your %s first.', $type));
		}

		switch ($type)
		{
			case 'Array':
				if (!\is_array(self::$elements))
				{
					throw new \TypeError(\sprintf('You must have to bind an %s.', $type));
				}
			break;
			case 'Object':
				if (!\is_object(self::$elements))
				{
					throw new \TypeError(\sprintf('You must have to bind an %s.', $type));
				}
			break;
			case 'String':
				if (!\is_string(self::$elements))
				{
					throw new \TypeError(\sprintf('You must have to bind an %s.', $type));
				}
			break;
		}
	}
}
