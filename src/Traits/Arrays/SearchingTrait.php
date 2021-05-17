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
 * Trait function for array modifiers
 *
 * @since   1.0.0
 */
trait SearchingTrait
{
	/**
	 * Find element if it satisfies the callback's rule.
	 *
	 * @param	callable	$callback	Callback function which contains two arguments ($item, $index)
	 * 								and returns a boolean value. If the return value is true then
	 * 								it understands that the searching item is found and returns it.
	 *
	 * @return	mixed				Searched value if found. null otherwise.
	 * @since	1.0.0
	 */
	public function find(callable $callback)
	{
		$elements = $this->get();
		$findValue = null;
		$index = 0;

		foreach ($elements as $key => $item)
		{
			/**
			 * If the item is an array then make it as an instance of JsArray
			 */
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			$condition = \call_user_func_array($callback, [$item, $index, $key]);

			++$index;

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
	 * Find element index if it satisfies the callback's rule.
	 *
	 * @param	callable	$callback	Callback function which contains two arguments ($item, $index)
	 * 								and returns a boolean value. If the return value is true then
	 * 								it understands that the searching item is found and returns it's index value.
	 *
	 * @return	integer				Searched value if found. -1 otherwise.
	 * @since	1.0.0
	 */
	public function findIndex($callback) : int
	{
		$elements = $this->get();
		$index = 0;
		$findIndex = -1;
		$arrayIndex = 0;

		foreach ($elements as $key => $item)
		{
			/**
			 * If an array them make it an instance of JsArray
			 */
			if (\is_array($item))
			{
				$item = $this->bind($item, false);
			}

			$condition = \call_user_func_array($callback, [$item, $arrayIndex, $key]);

			++$arrayIndex;

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
	 * @param	callable	$callback	Callback function which contains two arguments ($item, $index)
	 * 								and returns a boolean value. If the return value is true then
	 * 								it understands that the searching item is found and returns it's index value.
	 *
	 * @return	integer				Searched value if found. -1 otherwise.
	 * @since	1.0.0
	 */
	public function findLastIndex($callback) : int
	{
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

			$condition = \call_user_func_array($callback, [$item, $i, $keys[$i]]);

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
	 * @param	mixed	$item		The testing item
	 * @param	int		$fromIndex	From which index the search starts.
	 *
	 * @return	boolean	true if found, false otherwise.
	 */
	public function includes($item, $fromIndex = 0)
	{
		$elements = $this->get();
		$length = $this->length;

		/**
		 * Sanitize the search starting position. If the provided fromIndex
		 * is a negative number then take the maximum between the 0 and $length + $fromIndex
		 * so that it never being a negative index number.
		 * For positive numbers the from index never be greater than the $length
		 *
		 */
		$fromIndex = (int) $fromIndex;
		$start = $fromIndex < 0 ?
			max(0, $length + $fromIndex) :
			min($length, $fromIndex);

		for ($i = $start; $i < $length; ++$i)
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

	/**
	 * Find the indexOf of an item in the array.
	 *
	 * @param	mixed	$item		The item to find.
	 * @param	integer	$fromIndex	From index from where it starts searching.
	 *
	 * @return	boolean				Index value of first occurrence. If not found then returns -1
	 * @since	1.0.0
	 */
	public function indexOf($item, $fromIndex = 0)
	{
		$elements = $this->get();
		$length = $this->length;

		$findIndex = -1;

		$fromIndex = (int) $fromIndex;

		/**
		 * If no value in the array then return -1.
		 */
		if ($length === 0)
		{
			return -1;
		}

		/**
		 * If the fromIndex value is greater than or equal to the length
		 * of the array then return -1. That means there is nothing to search.
		 */
		if ($fromIndex >= $length)
		{
			return -1;
		}

		/**
		 * Find the kth place from where it starts searching.
		 * If fromIndex is negative then take the maximum value of between
		 * length + fromIndex and zero.
		 *
		 * If it's a positive number then takes the fromIndex directly.
		 */
		$k = $fromIndex < 0 ?
			max($length + $fromIndex, 0) :
			$fromIndex;

		for ($i = 0; $i < $length; ++$i)
		{
			/**
			 * Check if the index value is greater than or equal to the
			 * starting index $k and if the element strictly equal to the
			 * searching item then index found then return the index value.
			 *
			 * If nothing found then return -1.
			 */
			if ($i >= $k && $elements[$i] === $item)
			{
				$findIndex = $i;
				break;
			}
		}

		return $findIndex;
	}

	/**
	 * Find the lastIndexOf of an item in the array.
	 *
	 * @param	mixed	$item		The item to find.
	 * @param	integer	$fromIndex	From index from where it starts searching.
	 *
	 * @return	boolean				Index value of last occurrence. If not found then returns -1
	 * @since	1.0.0
	 */
	public function lastIndexOf($item, $fromIndex = 0)
	{
		$elements = $this->get();
		$length = $this->length;

		$findIndex = -1;

		$fromIndex = (int) $fromIndex;

		/**
		 * If no value in the array then return -1.
		 */
		if ($length === 0)
		{
			return -1;
		}

		/**
		 * If the fromIndex value is greater than or equal to the length
		 * of the array then return -1. That means there is nothing to search.
		 */
		if ($fromIndex >= $length)
		{
			return -1;
		}

		/**
		 * Find the kth place from where it starts searching.
		 * If fromIndex is negative then take the maximum value of between
		 * length + fromIndex and zero.
		 *
		 * If it's a positive number then takes the fromIndex directly.
		 */
		$k = $fromIndex < 0 ?
			max($length + $fromIndex, 0) :
			$fromIndex;

		$index = 0;

		for ($i = $length - 1; $i >= 0; --$i)
		{
			/**
			 * Check if the index value is greater than or equal to the
			 * starting index $k and if the element strictly equal to the
			 * searching item then index found then return the index value.
			 *
			 * If nothing found then return -1.
			 */
			if ($i >= $k && $elements[$i] === $item)
			{
				$findIndex = $index;
				break;
			}

			++$index;
		}

		return $findIndex;
	}
}
