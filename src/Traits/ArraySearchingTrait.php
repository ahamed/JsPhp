<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits;

use Ahamed\JsPhp\JsArray;

/**
 * Trait function for array modifiers
 *
 * @since   1.0.0
 */
trait ArraySearchingTrait
{
	/**
	 * Find element if it satisfies the callback's rule.
	 *
	 * @param	func	$callback	Callback function which contains two arguments ($item, $index)
	 * 								and returns a boolean value. If the return value is true then
	 * 								it understands that the searching item is found and returns it.
	 *
	 * @return	mixed				Searched value if found. null otherwise.
	 * @since	1.0.0
	 */
	public function find($callback)
	{
		$this->check();
		$this->isCallable($callback);

		$elements = $this->get();
		$findValue = null;

		foreach ($elements as $key => $item)
		{
			/**
			 * If the item is an array then make it as an instance of JsArray
			 */
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			$condition = \call_user_func_array($callback, [$item, $key]);

			/**
			 * If user condition returns true then the item is found
			 * and takes the item and returns it.
			 */
			if (!empty($condition))
			{
				$findValue = $item;
				break;
			}
		}

		/**
		 * If the item is an instance of JsArray then retrieve the original array.
		 */
		if ($findValue instanceof JsArray)
		{
			$findValue = $findValue->get();
		}

		return $findValue;
	}

	/**
	 * Find the last element if it satisfies the callback's rule.
	 *
	 * @param	func	$callback	Callback function which contains two arguments ($item, $index)
	 * 								and returns a boolean value. If the return value is true then
	 * 								it understands that the searching item is found and returns it.
	 *
	 * @return	mixed				Return the last value if found. null otherwise.
	 * @since	1.0.0
	 */
	public function findLast($callback)
	{
		$this->check();
		$this->isCallable($callback);

		$elements = $this->get();
		$length = $this->length;

		$findValue = null;

		$keys = array_keys($elements);

		for ($i = $length - 1; $i >= 0; --$i)
		{
			$item = $elements[$i];

			if (\is_array($elements[$i]))
			{
				$item = $this->bind($elements[$i], false);
			}

			$condition = \call_user_func_array($callback, [$item, $keys[$i]]);

			/**
			 * If user condition returns truth value that means it finds the
			 * value, breaks the loop and return the found value.
			 */
			if (!empty($condition))
			{
				$findValue = $elements[$i];
				break;
			}
		}

		/**
		 * Check if the found value is an instance of JsArray.
		 * If then make it an regular array.
		 */
		if ($findValue instanceof JsArray)
		{
			$findValue = $findValue->get();
		}

		return $findValue;
	}

	/**
	 * Find element index if it satisfies the callback's rule.
	 *
	 * @param	func	$callback	Callback function which contains two arguments ($item, $index)
	 * 								and returns a boolean value. If the return value is true then
	 * 								it understands that the searching item is found and returns it's index value.
	 *
	 * @return	integer				Searched value if found. -1 otherwise.
	 * @since	1.0.0
	 */
	public function findIndex($callback) : int
	{
		$this->check();
		$this->isCallable($callback);

		$elements = $this->get();

		$index = 0;
		$findIndex = -1;

		foreach ($elements as $key => $item)
		{
			/**
			 * If an array them make it an instance of JsArray
			 */
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			$condition = \call_user_func_array($callback, [$item, $key]);

			/**
			 * If user condition matches then find the item and return the index.
			 */
			if (!empty($condition))
			{
				$findIndex = $index;
				break;
			}

			$index++;
		}

		return $findIndex;
	}

	/**
	 * Find the last element index if it satisfies the callback's rule.
	 *
	 * @param	func	$callback	Callback function which contains two arguments ($item, $index)
	 * 								and returns a boolean value. If the return value is true then
	 * 								it understands that the searching item is found and returns it's index value.
	 *
	 * @return	integer				Searched value if found. -1 otherwise.
	 * @since	1.0.0
	 */
	public function findLastIndex($callback) : int
	{
		$this->check();
		$this->isCallable($callback);

		$elements = $this->get();
		$length = $this->length;

		$index = 0;
		$findLastIndex = -1;
		$keys = array_keys($elements);

		for ($i = $length - 1; $i >= 0; --$i)
		{
			$item = $elements[$i];

			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			$condition = \call_user_func_array($callback, [$item, $keys[$i]]);

			if (!empty($condition))
			{
				/**
				 * We traverse from the end of the array and when find the
				 * item there we stopped so the index is increased with respect to the
				 * last to first direction. But out index value needs from the first position.
				 */
				$findLastIndex = ($length - 1) - $index;
				break;
			}

			++$index;
		}

		return $findLastIndex;
	}

	/**
	 * Test if a value includes on an array.
	 * Note: It checks loose equality while searching.
	 *
	 * @param	mixed	$item	The testing item
	 *
	 * @return	boolean	true if found, false otherwise.
	 */
	public function includes($item)
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;

		for ($i = 0; $i < $length; ++$i)
		{
			/**
			 * It matches the array elements with loose equality with the searched item.
			 */
			if ($elements[$i] == $item)
			{
				return true;
			}
		}

		return false;
	}
}
