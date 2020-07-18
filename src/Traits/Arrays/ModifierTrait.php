<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits\Arrays;

/**
 * Trait function for array modifiers
 *
 * @since   1.0.0
 */
trait ModifierTrait
{
	/**
	 * Fill an array by a given value within a range or full array.
	 *
	 * @param	mixed		$value		The value by which the array will be filled.
	 * @param	integer		$start		The starting index from which filling starts.
	 * @param	integer		$end		The ending index to which the filling happens.
	 *
	 * @return	self
	 * @since	1.0.0
	 */
	public function fill($value, $start = null, $end = null)
	{
		$this->check();

		if (!isset($value))
		{
			throw new \InvalidArgumentException(sprintf('Set fill value.'));
		}

		$elements = $this->get();
		$length = $this->length;

		/**
		 * Make the start value a 32 bit integer value by 0 bit right shifting.
		 */
		$relativeStart = (int) $start;

		/**
		 * If then relativeStart is a negative number then add this with the length of the
		 * array and set the value of $k as the maximum of the summation and 0 because if
		 * the summation of the length and relative start becomes a negative number again
		 * then we should take 0, as the index could not be negative.
		 *
		 * And if the relativeStart is a positive number then set $k is equal to
		 * the minimum of relativeStart and the length of the array. The reason of this
		 * is, if the value of the relative start is exceeded the length of the array then take the
		 * length as the start value.
		 */
		$k = $relativeStart < 0 ?
			max($length + $relativeStart, 0) :
			min($relativeStart, $length);

		/**
		 * If end limit is not given then take the length as the ene value,
		 * otherwise take the end value and make it 32 bit number by right shifting 0 bit.
		 */
		$relativeEnd = is_null($end) ? $length : (int) $end;

		/**
		 * As described before the upper limit could not less than 0 or greater than the length of the array.
		 */
		$finalValue = $relativeEnd < 0 ?
			max($length + $relativeEnd, 0) :
			min($relativeEnd, $length);

		$filledArray = [];

		$inc = 0;

		foreach ($elements as $key => $item)
		{
			/**
			 * If the current index value is within the given range
			 * then fill the array index by the fill value otherwise keep the
			 * original value.
			 */
			if ($inc >= $k && $inc < $finalValue)
			{
				$filledArray[$key] = $value;
			}
			else
			{
				$filledArray[$key] = $item;
			}

			++$inc;
		}

		/**
		 * Finally mutate the original array with the filled one
		 */
		$this->bind($filledArray);

		return $this;
	}

	/**
	 * Reverse the array and return a new one.
	 *
	 * @return	self	Reversed Array
	 * @since	1.0.0
	 */
	public function reverse()
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;

		$reversedArray = [];

		/**
		 * Check if the array is an associative array or a sequential array.
		 * If this is an associative array then reverse with the keys otherwise
		 * keys don't matter.
		 */
		$isAssoc = self::isAssociativeArray($elements);
		$keys = array_keys($elements);

		for ($i = $length - 1; $i >= 0; --$i)
		{
			if ($isAssoc)
			{
				$key = $keys[$i];

				if (\is_numeric($key))
				{
					$reversedArray[] = $elements[$keys[$i]];
				}
				else
				{
					$reversedArray[$keys[$i]] = $elements[$keys[$i]];
				}
			}
			else
			{
				$reversedArray[] = $elements[$i];
			}
		}

		/**
		 * Mutate the original array with the reversed one and return the instance for chaining.
		 */
		$this->bind($reversedArray);

		return $this;
	}

	/**
	 * Flatten a multi-dimensional array to a 1-D array.
	 * Currently there is no level of flattening the array, it flattens
	 * using Infinite level and makes a flat array.
	 *
	 * @return	JsArray		The flatten array as the instanceof JsArray so that user can chain it.
	 * @since	1.0.0
	 */
	public function flat()
	{
		$this->check();

		/**
		 * Created a stack with the array
		 */
		$stack  = $this->get();

		/**
		 * Check the array is an associative array or not. If it's an associative
		 * array then throw an error that Flattening could not be applied on an associative array.
		 */
		$isAssoc = self::isAssociativeArray($stack);

		if ($isAssoc)
		{
			throw new \UnexpectedValueException(\sprintf('Flatten could not be applied to an associative array. Please use it in sequential array.'));
		}

		$flattenArray = [];

		/**
		 * Checking while the stack is not empty then pop the last value
		 * from the stack, if the popped value is an array then push the
		 * value into the stack, otherwise push the value into the flattenArray.
		 */
		while (count($stack))
		{
			$next = array_pop($stack);

			if (\is_array($next))
			{
				$stack = array_merge($stack, $next);
			}
			else
			{
				array_push($flattenArray, $next);
			}
		}

		/**
		 * Bind the new flattenArray but in immutable state. So it returns
		 * a new array without touching the original one.
		 *
		 * It also reverse the flattenArray because while we've created the
		 * flatten array then it has created in a reversed order as we use
		 * stack and it takes values from the last.
		 */
		$newInstance = $this->bind($flattenArray, false);

		return $newInstance->reverse();
	}
}
