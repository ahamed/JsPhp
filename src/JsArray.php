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

		parent::bind($modifiedArray);

		return (new self);
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

		parent::bind($filteredArray);

		return (new self);
	}

	/**
	 * Reduce function to loop through an array and returns
	 * a new array based on it's callback.
	 *
	 * @param	func	$callback	Callback function which takes (accumulator, currentValue, index)
	 * 								as it's arguments and returns the accumulator.
	 * @param	mixed	$initial	Initial value. If this is not defined then the first index of
	 * 								array will be used as the initial value.
	 *
	 * @return	self
	 * @since	1.0.0
	 */
	public static function reduce($callback, $initial = null)
	{
		/**
		 * Check if the callback is a valid callable function
		 */
		if (!\is_callable($callback))
		{
			throw new \InvalidArgumentException(sprintf('The first parameter must be a function.'));
		}

		parent::check();

		if (!isset($initial))
		{
			$accumulator = static::$elements[0];
			$skipFirst = 1;
		}
		else
		{
			$accumulator = $initial;
		}

		foreach (static::$elements as $key => $item)
		{
			if (isset($skipFirst))
			{
				unset($skipFirst);
				continue;
			}

			$accumulator = \call_user_func_array($callback, [$accumulator, $item, $key]);
		}

		if (\is_array($accumulator))
		{
			parent::bind($accumulator);

			return (new self);
		}

		return $accumulator;
	}

	/**
	 * Every is a function which returns a boolean value if every value of an array has passed
	 * a specific condition,
	 *
	 * @param	func	$callback	The callback function which defines the rule. If each and
	 * 								every element of the array has passed the rule then it returns
	 * 								true. Otherwise it returns false.
	 *
	 * @return	boolean				True if each and every element passes the condition, false otherwise.
	 * @since	1.0.0
	 */
	public static function every($callback)
	{
		/**
		 * Check if the callback is a valid callable function
		 */
		if (!\is_callable($callback))
		{
			throw new \InvalidArgumentException(sprintf('The first parameter must be a function.'));
		}

		parent::check();

		$passed = 0;
		$length = count(static::$elements);

		foreach (static::$elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);
			$condition = !empty($condition) ? true : false;

			if ($condition === true)
			{
				$passed++;
			}
		}

		return $passed === $length;
	}

	/**
	 * Some is a function which returns a boolean value if only one element of an array has passed
	 * a specific condition,
	 *
	 * @param	func	$callback	The callback function which defines the rule. If any element
	 * 								of the array has passed the rule then it returns
	 * 								true. If all elements fail the test then returns false.
	 *
	 * @return	boolean				True if only one element passes the condition, false if all elements fail the test otherwise.
	 * @since	1.0.0
	 */
	public static function some($callback)
	{
		/**
		 * Check if the callback is a valid callable function
		 */
		if (!\is_callable($callback))
		{
			throw new \InvalidArgumentException(sprintf('The first parameter must be a function.'));
		}

		parent::check();

		$passed = false;

		foreach (static::$elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);
			$condition = !empty($condition) ? true : false;

			if ($condition === true)
			{
				$passed = true;
				break;
			}
		}

		return $passed;
	}
}
