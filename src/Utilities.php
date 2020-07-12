<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp;

/**
 * Utility class. This class contains all the utilities or the helper
 * functions of the system. All the methods are static.
 */
class Utilities
{
	/**
	 * Merge sort of an array.
	 *
	 * @param	JsArray		$array			An JsArray instance
	 * @param	Func		$compareFunc	Compare function for user defined sorting
	 *
	 * @return	JsArray
	 * @since	1.0.0
	 */
	public static function mergeSort($array, $compareFunc = null)
	{
		$length = $array->length;

		/**
		 * If the given array has only one or no element then nothing to sort.
		 */
		if ($length <= 1)
		{
			return $array;
		}

		/**
		 * Check if the array is an associative array. If then reserve the keys
		 */
		$isAssoc = JsArray::isAssociativeArray($array);

		/**
		 * Divide the array into two parts just in middle.
		 *
		 */
		$middle = floor($length / 2);
		$leftArray = $array->slice(0, $middle);
		$rightArray = $array->slice($middle);

		/**
		 * Merge and conquer the problem ;)
		 * This will merge but continue dividing the divided parts also
		 * and divide until gets one element
		 */
		return self::merge(
			self::mergeSort($leftArray, $compareFunc),
			self::mergeSort($rightArray, $compareFunc),
			$compareFunc,
			$isAssoc
		);
	}

	/**
	 * Merge two array after sorting them.
	 *
	 * @param	JsArray		$leftArray		The left part to merge
	 * @param	JsArray		$rightArray		The right part to merge
	 * @param	Func		$compareFunc	Compare function for user defined sorting
	 * @param	bool		$isAssoc		If the array is an associative array.
	 *
	 * @return	JsArray		Merged array after sorting.
	 * @since	1.0.0
	 */
	public static function merge($leftArray, $rightArray, $compareFunc, $isAssoc)
	{
		$sorted = new JsArray([]);
		$leftIndex = 0;
		$rightIndex = 0;

		/**
		 * Get the keys of the leftArray and rightArray.
		 * These will be used for reserving the associative array keys
		 */
		$leftKeys = array_keys($leftArray->get());
		$rightKeys = array_keys($rightArray->get());

		/**
		 * If leftIndex is not exceeded the leftArray's length and
		 * rightIndex is not exceeded the rightArray's length
		 * continue checking and merging.
		 */
		while ($leftIndex < $leftArray->length && $rightIndex < $rightArray->length)
		{
			/**
			 * Get the key value of a certain index
			 * for providing them to the user compare function
			 */
			$itemLeftKey = $leftKeys[$leftIndex];
			$itemRightKey = $rightKeys[$rightIndex];

			/**
			 * If the main array is an associative array then get the item
			 * with the help of keys.
			 * Otherwise get the item by using index.
			 */
			if ($isAssoc)
			{
				$itemLeft = $leftArray[$itemLeftKey];
				$itemRight = $rightArray[$itemRightKey];
			}
			else
			{
				$itemLeft = $leftArray[$leftIndex];
				$itemRight = $rightArray[$rightIndex];
			}

			/**
			 * If an item of the main array is an array then make it
			 * as an instance of JsArray for providing user privilege
			 * to handle them inside compare function.
			 */
			if (\is_array($itemLeft))
			{
				$itemLeft = new JsArray($itemLeft);
			}

			if (\is_array($itemRight))
			{
				$itemRight = new JsArray($itemRight);
			}

			/**
			 * If your compare function is given then get the response and go accordingly.
			 */
			if (!\is_null($compareFunc))
			{
				// Get the user compare function's return value.
				$condition = \call_user_func_array($compareFunc, [$itemLeft, $itemRight, $itemLeftKey, $itemRightKey]);

				/**
				 * If nothing return by the compare function then check default
				 * leftItem less than rightItem.
				 * If the compare function returns a value greater than 0 i.e.
				 * a positive value then swap the values and right value comes
				 * before the left value.
				 * Otherwise, it stands as it is.
				 */
				if (\is_null($condition))
				{
					$compare = $itemLeft < $itemRight;
				}
				elseif ($condition > 0)
				{
					$compare = false;
				}
				else
				{
					$compare = true;
				}
			}
			else
			{
				$compare = $itemLeft < $itemRight;
			}

			/**
			 * If compare is true then no swap happens. Push the left array value
			 * before the right array.
			 * Otherwise, right array value comes first than the left array.
			 */
			if ($compare)
			{
				/**
				 * Revert the inner JsArray into regular array
				 */
				if ($itemLeft instanceof JsArray)
				{
					$itemLeft = $itemLeft->get();
				}

				/**
				 * For associative array the keys would be preserved.
				 * And for sequential array the index would be rebase.
				 */
				if ($isAssoc)
				{
					$sorted[$leftKeys[$leftIndex]] = $itemLeft;
				}
				else
				{
					$sorted->push($itemLeft);
				}

				++$leftIndex;
			}
			else
			{
				/**
				 * Revert the inner JsArray into regular array
				 */
				if ($itemRight instanceof JsArray)
				{
					$itemRight = $itemRight->get();
				}

				/**
				 * For associative array the keys would be preserved.
				 * And for sequential array the index would be rebase.
				 */
				if ($isAssoc)
				{
					$sorted[$rightKeys[$rightIndex]] = $itemRight;
				}
				else
				{
					$sorted->push($itemRight);
				}

				++$rightIndex;
			}
		}

		/**
		 * This would be replaced with concat function of JsArray
		 */
		$merged = array_merge(
			$sorted->get(),
			$leftArray->slice($leftIndex)->get(),
			$rightArray->slice($rightIndex)->get()
		);

		return $sorted->bind($merged);
	}
}
