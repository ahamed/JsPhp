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
trait BasicsTrait
{
	/**
	 * Array::from method for generating an array (or JsArray instance) from an iterable
	 * with a user defined callable modifier.
	 *
	 * @param	array|string		$iterable	The iterable.
	 * @param	callable			$callable	The user defined callable.
	 *
	 * @return	JsArray				The created JsArray instance.
	 * @since	1.0.0
	 */
	public static function from($iterable, callable $callable = null) : JsArray
	{
		$array = new JsArray();
		$localArray = [];

		if ($iterable instanceof JsArray)
		{
			$iterable = $iterable->get();
		}

		if (\is_string($iterable))
		{
			$iterable = \str_split($iterable, 1);
		}

		$isAssoc = JsArray::isAssociativeArray($iterable);

		if ($isAssoc && !isset($iterable['length']))
		{
			return $array->bind([], false);
		}
		elseif ($isAssoc && isset($iterable['length']))
		{
			$length = (int) $iterable['length'];

			for ($i = 0; $i < $length; $i++)
			{
				if (!$callable)
				{
					$localArray[] = null;
				}
				else
				{
					$localArray[] = \call_user_func_array($callable, [null, $i]);
				}
			}

			return $array->bind($localArray, false);
		}

		foreach ($iterable as $index => $item)
		{
			$localArray[$index] = $callable
				? \call_user_func_array($callable, [$item, $index])
				: $item;
		}

		return $array->bind($localArray, false);
	}

	/**
	 * Array at method. This method will return the value of the array in the
	 * provided at index. The benefit over the square bracket index is that it
	 * can return you a value of negative index.
	 * This method is only works on sequential array. For associative array it
	 * returns null.
	 *
	 * @param	integer	$index	The at index.
	 *
	 * @return	mixed	The corresponding value situated at the index.
	 * @since	1.0.0
	 */
	public function at(int $index)
	{
		$this->check();
		$elements = $this->get();

		/** For associative array it always returns null. */
		if (self::isAssociativeArray($elements))
		{
			return null;
		}

		$length = $this->length;

		if ($index < 0)
		{
			$index = $length + $index;
		}

		if ($index >= $length || $index < 0)
		{
			throw new \OutOfRangeException(\sprintf('The provided index %d is out of range.', $index));
		}

		return $elements[$index];
	}

	/**
	 * Array push method
	 *
	 * @param	mixed	...$items	Variable number of elements to push into the array
	 *
	 * @return	integer				The length of the array after pushing the elements
	 * @since	1.0.0
	 */
	public function push(...$items) : int
	{
		$this->check();
		$elements = $this->get();

		if (empty($items))
		{
			$this->bind($elements);

			return $this->length;
		}

		/**
		 * Push the element(s) into the elements and finally mutate the array
		 * with updated array.
		 */
		array_push($elements, ...$items);
		$this->bind($elements);

		// Returns the length of the newly created array.
		return $this->length;
	}

	/**
	 * Remove an element from end the array and returns the removed element
	 * and update the existing array
	 *
	 * @return	mixed	Removed element from the end of the array.
	 * @since	1.0.0
	 */
	public function pop()
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;

		/**
		 * We cannot perform a pop operation on a empty array
		 */
		if ($length === 0)
		{
			return null;
		}

		// Popes the last element of the array.
		$removedValue = array_pop($elements);

		// Mutates the existing array with the array after popped.
		$this->bind($elements);

		// Returns the popped value.
		return $removedValue;
	}

	/**
	 * Remove an element from the start of the array and returns the removed element
	 * and update the existing array
	 *
	 * @return	mixed	Removed element from the start of the array.
	 * @since	1.0.0
	 */
	public function shift()
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;
		$isAssoc = self::isAssociativeArray($elements);

		/**
		 * We cannot perform a pop operation on a empty array
		 */
		if ($length === 0)
		{
			return null;
		}

		/**
		 * Get the keys of the array and take the value of the first key of the array
		 * and unset the value of the first key of the array.
		 * And finally update the array by updated array and return the removed element.
		 */
		if ($isAssoc)
		{
			$keys = $this->keys()->get();
			$removedValue = $elements[$keys[0]];
			unset($elements[$keys[0]]);
		}
		else
		{
			$removedValue = $elements[0];
			unset($elements[0]);
		}

		// Rebase the array keys.
		$elements = array_merge($elements);

		// Mutates the existing array with the array after popped.
		$this->bind($elements);

		// Returns the popped value.
		return $removedValue;
	}

	/**
	 * Push 1-N numbers of items in front of the array.
	 *
	 * @param	mixed	...$items	The items to push at the front.
	 *
	 * @return	integer				The length of updated array.
	 * @since	1.0.0
	 */
	public function unshift(...$items) : int
	{
		$this->check();

		if (!isset($items) || count($items) <= 0)
		{
			throw new \UnexpectedValueException(sprintf('You must have to pass at least one value to push'));
		}

		$elements = $this->get();
		$length = $this->length;
		$itemsLength = count($items);
		$keys = $this->keys()->get();

		$unshiftArray = [];

		/**
		 * Push the items in front of the array first.
		 * This will keep the keys if it's an associative array
		 * otherwise its rebase the indices.
		 */
		for ($k = 0; $k < $itemsLength; ++$k)
		{
			$unshiftArray[] = $items[$k];
		}

		/**
		 * After pushing the items into the unshiftArray adding the
		 * existing array elements after them.
		 *
		 * All numerical array keys will be modified to start counting from zero
		 * while literal keys won't be changed.
		 *
		 * That means if key of the original array is numerical then the value
		 * of the key is updated after counting this from the beginning.
		 * For an example, if we unshift 3 values at the front of the array and
		 * the first encounter of the numerical key is 1 then it's updated to 3.
		 *
		 * The literal keys won't be changes.
		 */
		$numericKey = $itemsLength;

		for ($i = 0; $i < $length; ++$i)
		{
			if (\is_numeric($keys[$i]))
			{
				$key = $numericKey;
				++$numericKey;
			}
			else
			{
				$key = $keys[$i];
			}

			$unshiftArray[$key] = $elements[$keys[$i]];
		}

		$instance = $this->bind($unshiftArray);

		return $instance->length;
	}

	/**
	 * Join an array elements with help of a separator value and returns a string
	 *
	 * @param	string	$separator	The separator value
	 *
	 * @return	string				Joined string.
	 * @since	1.0.0
	 */
	public function join(string $separator = ',') : string
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;

		/**
		 * Get the values of the array. We are not handling the keys of the array.
		 * For joining purpose we just need the values.
		 */
		$elements = array_values($elements);

		$joinedString = '';

		// Force make the separator string
		$separator = (string) $separator;

		/**
		 * If no elements in the array or the array is null then returns empty string.
		 */
		if (empty($elements) || $elements === null)
		{
			return '';
		}

		/**
		 * If there is only one element and the element is a string or boolean
		 * number then return the element making string.
		 */
		if ($length === 1)
		{
			if (\is_array($elements[0]))
			{
				$item = $this->bind($elements[0], false);
				$string = $item->join();
				unset($item);

				return $string;
			}
			else
			{
				return (string) $elements[0];
			}
		}

		/**
		 * If there are more than one elements. Its detached the first and
		 * last elements from the array and join them separately. If any of
		 * the elements of the array is an array then join this array separately
		 * with default (,) separator.
		 */
		if (is_array($elements[0]))
		{
			$item = $this->bind($elements[0], false);
			$joinedString .= $item->join();
			unset($item);
		}
		else
		{
			$joinedString .= $elements[0];
		}

		/**
		 * Join all the elements except the first and last one.
		 */
		for ($i = 1; $i < $length - 1; ++$i)
		{
			if (\is_array($elements[$i]))
			{
				$item = $this->bind($elements[$i], false);
				$joinedString .= $separator . $item->join();
				unset($item);
			}
			else
			{
				$joinedString .= $separator . $elements[$i];
			}
		}

		/**
		 * Join the last element.
		 */
		if (is_array($elements[$length - 1]))
		{
			$item = $this->bind($elements[$length - 1], false);
			$joinedString .= $separator . $item->join();
			unset($item);
		}
		else
		{
			$joinedString .= $separator . $elements[$length - 1];
		}

		return $joinedString;
	}

	/**
	 * Slice the array and returns a new array within the given range parameters.
	 *
	 * @param	int		$start		The start value
	 * @param	int		$end		The end value.
	 *
	 * @return	JsArray				The sliced array
	 * @since	1.0.0
	 */
	public function slice(int $start = 0, int $end = null) : JsArray
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;

		$start = (int) $start;
		$end = \is_null($end) ? $length : $end;

		/**
		 * Get the calculated start index from where the sliced array
		 * takes the elements.
		 */
		$startIndex = $start < 0 ?
			max($length + $start, 0) :
			min($start, $length);

		/**
		 * Get the calculated end index or final index to where the sliced
		 * array stops taking elements.
		 */
		$finalIndex = $end < 0 ?
			max($length + $end, 0) :
			min($end, $length);

		/**
		 * If the start index be greater than the final index then nothing
		 * to slice. Returns an empty array.
		 */
		if ($startIndex > $finalIndex)
		{
			return $this->bind([], false);
		}

		$preserveKeys = false;

		/**
		 * If the array is an associative array then keeps the keys of the array.
		 */
		if (self::isAssociativeArray($elements))
		{
			$preserveKeys = true;
		}

		$keys = $this->keys()->get();
		$slicedArray = [];

		/**
		 * Generate the sliced array and return a new array without
		 * modifying the original one.
		 */
		for ($i = $startIndex; $i < $finalIndex; ++$i)
		{
			if ($preserveKeys)
			{
				$slicedArray[$keys[$i]] = $elements[$keys[$i]];
			}
			else
			{
				$slicedArray[] = $elements[$keys[$i]];
			}
		}

		return $this->bind($slicedArray, false);
	}

	/**
	 * Splice an array with the help of start index and delete count,
	 * and if items are given for insertion then push them after deletion.
	 *
	 * @param	int		$start			The star index
	 * @param	int		$deleteCount	How many items to delete after the start index.
	 * @param	mixed	...$items		A variable number of items parameter to insert after deletion after the start index.
	 *
	 * @return	JsArray					Deleted items array but the self instance for chaining.
	 * @since	1.0.0
	 */
	public function splice(int $start = null, int $deleteCount = null, ...$items) : JsArray
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;
		$keys = $this->keys()->get();

		/**
		 * If no any parameter are provided then return empty array
		 */
		if (\is_null($start) && \is_null($deleteCount) && empty($items))
		{
			return $this->bind([], false);
		}

		$start = (int) $start;

		/**
		 * If delete count is not provided or null provided and if there is items
		 * to push then deleteCount is zero (0) otherwise deleteCount is the
		 * minimum of $length - $start and $length.
		 *
		 * If deleteCount is provided then takes the integer value of the deleteCount
		 */
		$deleteCount = \is_null($deleteCount) ?
			(empty($items) ? min($length - $start, $length) : 0) :
			(int) $deleteCount;

		$assoc = self::isAssociativeArray($elements);

		/**
		 * The delete start index. If the start index is a negative number
		 * then add the start with the length of the array and take the maximum
		 * between 0 and start + length. This is because if the summation of start + length
		 * goes down to 0 then we take the 0 as the starting value as the index could not be a negative number.
		 *
		 * If the start index is a positive then take the minimum of start and length.
		 * This is because if the provided start value is greater then the length itself
		 * then we take the length as start.
		 */
		$deleteStart = $start < 0 ?
			max($start + $length, 0) :
			min($start, $length);

		/**
		 * Delete Count is the how many items to delete after the start index.
		 * We take the minimum between the length and the summation of deleteStart and deleteCount.
		 */
		$deleteEnds = min($deleteStart + $deleteCount, $length);

		$deletedArray = [];
		$finalArray = [];

		/**
		 * Generate the deleted items array and update the existing array
		 * after deletion.
		 */
		for ($i = $deleteStart; $i < $deleteEnds; ++$i)
		{
			if ($assoc)
			{
				$deletedArray[$keys[$i]] = $elements[$keys[$i]];
				unset($elements[$keys[$i]]);
			}
			else
			{
				$deletedArray[] = $elements[$i];
				unset($elements[$i]);
			}
		}

		/**
		 * Rebase the updated array indices.
		 */
		$elements = array_merge($elements);

		/**
		 * Re-calculate the properties of the array after deletion.
		 */
		$newLength = count($elements);
		$newKeys = array_keys($elements);
		$itemsLength = count($items);

		/**
		 * If no item to add into the split position then mutate the original array
		 * with the after deletion array and return the new deleted Array.
		 */
		if ($itemsLength <= 0)
		{
			$this->bind($elements);

			return $this->bind($deletedArray, false);
		}

		/**
		 * If Items are given for attach then we split the array into two parts
		 * called leftArray and rightArray at deleteStart position.
		 *
		 * If splice indicates to delete from index zero and insert value at there
		 * then in the leftArray nothing would be there and the rightArray contains
		 * the whole array.
		 *
		 * If the splice indicates to delete and insert from and into the length of
		 * the array then the rightArray contains nothing and the rest of the array
		 * belongs to the left array.
		 *
		 * Otherwise we generate two parts of the array by using the rule
		 * leftPart: [0, max($ds - 1, 0)] and rightPart: [$ds, max($l - 1, 0)].
		 * Where $ds is the index position of the deleteStart and $l is the length of th array.
		 *
		 * After that, generates the two array leftArray and rightArray by using the
		 * ranges leftPart and rightParts respectively.
		 */
		$leftArray = [];
		$rightArray = [];

		if ($deleteStart === 0)
		{
			$rightArray = $elements;
		}
		elseif ($deleteStart >= $newLength)
		{
			$leftArray = $elements;
		}
		else
		{
			if ($newLength > 0)
			{
				/**
				 * Calculating the array chunk ranges.
				 */
				$leftPart = [0, max($deleteStart - 1, 0)];
				$rightPart = [$deleteStart, max($newLength - 1, 0)];

				/**
				 * Generating the leftArray from the range leftPart
				 */
				if ($leftPart[0] <= $leftPart[1])
				{
					for ($x = $leftPart[0]; $x <= $leftPart[1]; ++$x)
					{
						$leftArray[$newKeys[$x]] = $elements[$newKeys[$x]];
					}
				}

				/**
				 * Generating the rightArray from the range rightPart
				 */
				if ($rightPart[0] <= $rightPart[1])
				{
					for ($x = $rightPart[0]; $x <= $rightPart[1]; ++$x)
					{
						$rightArray[$newKeys[$x]] = $elements[$newKeys[$x]];
					}
				}
			}
		}

		/**
		 * Finally merge the items along with two chunks. The items array
		 * acts like the middle point of the left and right arrays.
		 */
		$finalArray = array_merge($leftArray, $items, $rightArray);

		/**
		 * Mutate the array by updated array.
		 */
		$this->bind($finalArray);

		// Create and JsArray instance and return the deleted items array
		return $this->bind($deletedArray, false);
	}

	/**
	 * Concat arrays or values with the reference array and returns
	 * a new array. This is not mutate the original array rather
	 * returns a new array.
	 *
	 * @param	mixed		...$values		Scaler value(s) or array(s)
	 *
	 * @return	JsArray		Concatenated array.
	 * @since	1.0.0
	 */
	public function concat(...$values) : JsArray
	{
		$this->check();
		$elements = $this->get();

		/**
		 * If nothing provided to concatenate then return the
		 * current array values but with a new instance.
		 */
		if (empty($values))
		{
			return $this->bind($elements, false);
		}

		// Initially merge the elements and put them into the concatenated array.
		$concatenated = array_merge([], $elements);

		/**
		 * Iterate through the values parameter if the given parameter is
		 * an instance of JsArray then get the plain array elements and
		 * merge with concatenated array.
		 * If value is a plain array then concat it with the concatenate array.
		 * If value is a scaler value then push this.
		 */
		foreach ($values as $value)
		{
			if ($value instanceof JsArray)
			{
				$concatenated = array_merge($concatenated, $value->get());
			}
			elseif (\is_array($value))
			{
				$concatenated = array_merge($concatenated, $value);
			}
			else
			{
				array_push($concatenated, $value);
			}
		}

		return $this->bind($concatenated, false);
	}
}
