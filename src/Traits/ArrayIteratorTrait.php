<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits;

/**
 * Trait function for array conditionals
 *
 * @since   1.0.0
 */
trait ArrayIteratorTrait
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
	public function forEach($callback)
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		foreach ($elements as $key => $item)
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
	public function map($callback)
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		$modifiedArray = [];

		foreach ($elements as $key => $item)
		{
			$modifiedItem = \call_user_func_array($callback, [$item, $key]);

			if (!isset($modifiedItem))
			{
				$modifiedItem = null;
			}

			$modifiedArray[$key] = $modifiedItem;
		}

		$newInstance = new $this($modifiedArray);

		return $newInstance;
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
	public function filter($callback, $reserveKeys = false)
	{
		$this->isCallable($callback);
		$this->check();

		$filteredArray = [];
		$elements = $this->get();

		foreach ($elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);

			if (!empty($condition))
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

		$newInstance = new $this($filteredArray);

		return $newInstance;
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
	public function reduce($callback, $initial = null)
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		if (!isset($initial))
		{
			$accumulator = $elements[0];
			$skipFirst = 1;
		}
		else
		{
			$accumulator = $initial;
		}

		foreach ($elements as $key => $item)
		{
			if (isset($skipFirst))
			{
				unset($skipFirst);
				continue;
			}

			$accumulator = \call_user_func_array($callback, [$accumulator, $item, $key]);
		}

		/**
		 * If the accumulator is an array then creates a new array
		 * and returns it.
		 */
		if (\is_array($accumulator))
		{
			$newInstance = new $this($accumulator);

			return $newInstance;
		}

		return $accumulator;
	}
}
