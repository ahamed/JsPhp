<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits;

/**
 * Trait function for array modifiers
 *
 * @since   1.0.0
 */
trait ArrayModifierTrait
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

		$length = count($elements) >> 0;
		$relativeStart = $start >> 0;

		$k = $relativeStart < 0 ?
			max($length + $relativeStart, 0) :
			min($relativeStart, $length);

		$relativeEnd = is_null($end) ? $length : $end >> 0;

		$finalValue = $relativeEnd < 0 ?
			max($length + $relativeEnd, 0) :
			min($relativeEnd, $length);

		$filledArray = [];

		$inc = 0;

		foreach ($elements as $key => $item)
		{
			if ($inc >= $k && $inc <= $finalValue)
			{
				$filledArray[$key] = $value;
			}
			else
			{
				$filledArray[$key] = $item;
			}

			++$inc;
		}

		$this->bind($filledArray, false);

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
		$length = $this->length();

		$reversedArray = [];

		$isAssoc = $this->isAssociativeArray($elements);

		if ($isAssoc)
		{
			$keys = array_keys($elements);
		}

		for ($i = $length - 1; $i >= 0; --$i)
		{
			if ($isAssoc)
			{
				$reversedArray[$keys[$i]] = $elements[$i];
			}
			else
			{
				$reversedArray[] = $elements[$i];
			}
		}

		$this->bind($reversedArray, false);

		return $this;
	}
}
