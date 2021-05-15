<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits\Arrays;

use Ahamed\JsPhp\JsArray;

/**
 * Trait function for array conditionals
 *
 * @since   1.0.0
 */
trait IteratorTrait
{

	/**
	 * Method to iterate through an array and apply the callback
	 * function to each element and return the element
	 *
	 * @param	callable	$callback	The callback function
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function forEach(callable $callback) : void
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		$index = 0;

		foreach ($elements as $key => $item)
		{
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			\call_user_func_array($callback, [$item, $index, $key]);

			++$index;
		}
	}

	/**
	 * Method to iterate through an array and apply an modification
	 * to each elements and returns a new array.
	 *
	 * @param	callable	$callback	The callback function. This function must have a
	 * 								return value. If there is no return value then it
	 * 								returns `null`.
	 *
	 * @return	JsArray	Modified array
	 * @since	1.0.0
	 */
	public function map(callable $callback) : JsArray
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		$modifiedArray = [];

		$index = 0;

		foreach ($elements as $key => $item)
		{
			/**
			 * If item is an array then make the item an instance of JsArray
			 */
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			$modifiedItem = \call_user_func_array($callback, [$item, $index, $key]);

			++$index;

			/**
			 * Retrieve the original array instead of the JsArray instance.
			 */
			if ($modifiedItem instanceof JsArray)
			{
				$modifiedItem = $modifiedItem->get();
			}

			/**
			 * If nothing returns from the callback function then
			 * set the value as null
			 */
			if (!isset($modifiedItem))
			{
				$modifiedItem = null;
			}

			/**
			 * This method keeps the original keys
			 */
			$modifiedArray[$key] = $modifiedItem;

			/**
			 * Unset the modifiedItem so that if it's an instance of
			 * JsArray then it releases the memory.
			 */
			unset($modifiedItem);
		}

		/**
		 * Create the newly created modifiedArray as an instance of
		 * JsArray for chaining support.
		 */
		$newInstance = $this->bind($modifiedArray, false);

		return $newInstance;
	}

	/**
	 * Filters an array and returns a new array.
	 *
	 * @param	callable	$callback		The callback function. This function must
	 * 									return a boolean value. If returns something
	 * 									else rather than true/false then it takes the
	 * 									truth value of the returned value. If nothing
	 * 									returns then it counts this as a falsy value.
	 *
	 * @return	JsArray		Filtered Array
	 * @since	1.0.0
	 */
	public function filter(callable $callback) : JsArray
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();
		$isAssoc = self::isAssociativeArray($elements);

		$filteredArray = [];
		$index = 0;

		foreach ($elements as $key => $item)
		{
			/**
			 * If item is an array then make the item an instance of JsArray
			 */
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			$condition = \call_user_func_array($callback, [$item, $index, $key]);

			++$index;

			/**
			 * If the callback returns a truth value then keep the item
			 */
			if (!empty($condition))
			{
				/**
				 * If the item is an instance of JsArray then retrieve the
				 * original array elements.
				 */
				if ($item instanceof JsArray)
				{
					$item = $item->get();
				}

				/**
				 * If the array is an associative array then preserve the keys
				 * If any numeric key exists on the associative array then
				 * rearrange the numeric indics from zero.
				 */
				if ($isAssoc)
				{
					if (\is_numeric($key))
					{
						$filteredArray[] = $item;
					}
					else
					{
						$filteredArray[$key] = $item;
					}
				}
				else
				{
					$filteredArray[] = $item;
				}
			}
		}

		/**
		 * Make an instance of JsArray for chaining support.
		 */
		$newInstance = $this->bind($filteredArray, false);

		return $newInstance;
	}

	/**
	 * FlatMap method. This method run a map on an array using user callable and
	 * flatten the the mapped array (into 1 depth) if nested found.
	 *
	 * @param	callable	$callable	The user defined callable.
	 *
	 * @return	JsArray		The flat mapped JsArray instance for chaining.
	 * @since	1.0.0
	 */
	public function flatMap(callable $callable) : JsArray
	{
		$mapped = $this->map($callable);
		$flatArrayInstance = $mapped->flat();

		return $flatArrayInstance;
	}

	/**
	 * Reduce function to loop through an array and returns
	 * a new array based on it's callback.
	 *
	 * @param	callable	$callback	Callback function which takes (accumulator, currentValue, index)
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

		// Get the array
		$elements = $this->get();

		$skipFirst = false;

		/**
		 * Check if the initial param is provided then starts the
		 * accumulator with the initiator.
		 * Otherwise the first value of the elements array will be
		 * the initial value of the accumulator and user gets the
		 * current value item from the second value of the array.
		 */
		if (!isset($initial))
		{
			$accumulator = $elements[0];
			$skipFirst = true;
		}
		else
		{
			$accumulator = $initial;
		}

		$index = 0;

		foreach ($elements as $key => $item)
		{
			/**
			 * If the initial param is provided then skip the first item to execute.
			 */
			if ($skipFirst)
			{
				$skipFirst = false;
				continue;
			}

			/**
			 * If the item is an array then makes it as an instance of JsArray.
			 */
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			/**
			 * If the accumulator is an array them makes it as an instance of JsArray.
			 */
			if (\is_array($accumulator))
			{
				$accumulator = $this->bind($accumulator, false);
			}

			$accumulator = \call_user_func_array($callback, [$accumulator, $item, $index, $key]);

			++$index;

			/**
			 * If the updated accumulator is returned as an instance of JsArray
			 * then check the elements of the accumulator and if any of them
			 * is an instance of JsArray then retrieve the original
			 * array data and unset the JsArray instance/object as there is no
			 * need of this anymore and this also lead the program to collect
			 * the existing garbages.
			 */
			if ($accumulator instanceof JsArray)
			{
				$accumulator = $accumulator->map(
					function ($acc) {
						if ($acc instanceof JsArray)
						{
							$data = $acc->get();
							unset($acc);

							return $data;
						}

						return $acc;
					}
				);
			}
		}

		/**
		 * If the accumulator is an array then makes it as an instance of JsArray
		 * as we can continue chaining.
		 */
		if (\is_array($accumulator))
		{
			$newInstance = $this->bind($accumulator, false);

			return $newInstance;
		}

		return $accumulator;
	}
}
