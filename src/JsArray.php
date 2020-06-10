<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp;

use Ahamed\JsPhp\Core\JsBase;


/**
 * JsArray class gives the array methods
 *
 * @since   1.0.0
 */
class JsArray extends JsBase
{
	/**
	 * Method to iterate through an array and apply the callback
	 * function to each element and return the element
	 *
	 * @param	func	$callback	The callback function
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public static function forEach($callback)
	{
		/**
		 * Check if the callback is a valid callable function
		 */
		if (!\is_callable($callback))
		{
			throw new \InvalidArgumentException(sprintf('The first parameter must be a function.'));
		}

		parent::check();

		foreach (static::$elements as $key => $item)
		{
			\call_user_func_array($callback, [$item, $key]);
		}
	}

	/**
	 * Method to iterate through an array and apply an modification
	 * to each elements and returns a new array.
	 *
	 * @param	func	$callback	The callback function. This function must have a
	 * 								return value. If there is no return value then it
	 * 								returns `null`.
	 *
	 * @return	array	Modified array
	 * @since	1.0.0
	 */
	public static function map($callback)
	{
		/**
		 * Check if the callback is a valid callable function
		 */
		if (!\is_callable($callback))
		{
			throw new \InvalidArgumentException(sprintf('The first parameter must be a function.'));
		}

		parent::check();

		$modifiedArray = [];

		foreach (static::$elements as $key => $item)
		{
			$modifiedItem = \call_user_func_array($callback, [$item, $key]);

			if (!isset($modifiedItem))
			{
				$modifiedItem = null;
			}

			$modifiedArray[$key] = $modifiedItem;
		}

		return $modifiedArray;
	}

	/**
	 * Filters an array and returns a new array.
	 *
	 * @param	func	$callback		The callback function. This function must
	 * 									return a boolean value. If returns something
	 * 									else rather than true/false then it takes the
	 * 									truth value of the returned value. If nothing
	 * 									returns then it counts this as a falsy value.
	 *
	 * @param	boolean	$reserveKeys	By default it's false. If you make it true then
	 * 									it keep the original keys of the input array, otherwise
	 * 									it returns the array with 0 based sorted key.
	 *
	 * @return	array	Filtered Array
	 * @since	1.0.0
	 */
	public static function filter($callback, $reserveKeys = false)
	{
		/**
		 * Check if the callback is a valid callable function
		 */
		if (!\is_callable($callback))
		{
			throw new \InvalidArgumentException(sprintf('The first parameter must be a function.'));
		}

		parent::check();

		$filteredArray = [];

		foreach (static::$elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);
			$condition = !empty($condition) ? true : false;

			if ($condition === true)
			{
				if ($reserveKeys)
				{
					$filteredArray[$key] = $item;
				}
				else
				{
					$filteredArray[] = $item;
				}
			}
		}

		return $filteredArray;
	}
}
