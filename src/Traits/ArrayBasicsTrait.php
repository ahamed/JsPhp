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
trait ArrayBasicsTrait
{
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

		if (!isset($items) || count($items) <= 0)
		{
			throw new \UnexpectedValueException(sprintf('You must have to pass at least one value to push'));
		}

		$elements = $this->get();

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
		if (self::isAssociativeArray($elements))
		{
			$keys = $this->keys();
			$removedValue = $elements[$keys[0]];
			unset($elements[$keys[0]]);
		}
		else
		{
			$removedValue = $elements[0];
			unset($elements[0]);
			$elements = array_values($elements);
		}

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
		$keys = $this->keys();

		$assoc = self::isAssociativeArray($elements);

		$unshiftArray = [];

		/**
		 * Push the items in front of the array first.
		 * This will keep the keys if it's an associative array
		 * otherwise its rebase the indics.
		 */
		for ($k = 0; $k < $itemsLength; ++$k)
		{
			if ($assoc)
			{
				$itemIndex = $length + $k;
				$unshiftArray[$itemIndex] = $items[$k];
			}
			else
			{
				$unshiftArray[] = $items[$k];
			}
		}

		/**
		 * After pushing the items into the unshiftArray adding the
		 * existing array elements after them.
		 *
		 * It also keep its indices if it's an associative array,
		 * otherwise it rebase its indices.
		 */
		for ($i = 0; $i < $length; ++$i)
		{
			if ($assoc)
			{
				$unshiftArray[$keys[$i]] = $elements[$keys[$i]];
			}
			else
			{
				$unshiftArray[] = $elements[$i];
			}
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
	public function join($separator = ',') : string
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;

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
	 * @return	self				The sliced array
	 * @since	1.0.0
	 */
	public function slice($start = 0, $end = null) : self
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
			$keys = $this->keys();
		}

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
				$slicedArray[] = $elements[$i];
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
	 * @return	self					Deleted items array but the self instance for chaining.
	 * @since	1.0.0
	 */
	public function splice($start = 0, $deleteCount = 0, ...$items) : self
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;
		$keys = $this->keys();

		$start = (int) $start;
		$deleteCount = (int) $deleteCount;
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
		 * Re-calculate the properties of the array after deletion.
		 */
		$newLength = count($elements);
		$newKeys = array_keys($elements);
		$isAssoc = self::isAssociativeArray($elements);
		$itemsLength = count($items);

		/**
		 * If it's a sequential array then rebase the array indics.
		 */
		if (!$isAssoc)
		{
			$elements = array_values($elements);
		}

		/**
		 * If items given to push
		 */
		if ($itemsLength > 0)
		{
			for ($i = 0; $i < $newLength; ++$i)
			{
				/**
				 * If deleteStart index starts then push the items into this
				 * position.
				 */
				if ($i === $deleteStart)
				{
					for ($k = 0; $k < $itemsLength; ++$k)
					{
						if ($isAssoc)
						{
							$itemInsertionKey = $k;

							if (array_key_exists($k, $elements))
							{
								$itemInsertionKey = $newLength + $k;
							}

							$finalArray[$itemInsertionKey] = $items[$k];
						}
						else
						{
							$finalArray[] = $items[$k];
						}
					}

					/**
					 * Also insert the updated array's value after pushing the items.
					 */
					if ($isAssoc)
					{
						$finalArray[$newKeys[$i]] = $elements[$newKeys[$i]];
					}
					else
					{
						$finalArray[] = $elements[$i];
					}
				}
				else
				{
					if ($isAssoc)
					{
						$finalArray[$newKeys[$i]] = $elements[$newKeys[$i]];
					}
					else
					{
						$finalArray[] = $elements[$i];
					}
				}
			}
		}
		else
		{
			$finalArray = $elements;
		}

		/**
		 * Mutate the array by updated array.
		 */
		$this->bind($finalArray);

		// Create and JsArray instance and return the deleted items array
		return $this->bind($deletedArray, false);
	}
}
