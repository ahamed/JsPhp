<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp;

use Ahamed\JsPhp\Core\JsBase;
use Ahamed\JsPhp\Traits\ArrayBasicsTrait;
use Ahamed\JsPhp\Traits\ArrayConditionalTrait;
use Ahamed\JsPhp\Traits\ArrayIteratorTrait;
use Ahamed\JsPhp\Traits\ArrayModifierTrait;
use Ahamed\JsPhp\Traits\ArraySearchingTrait;


/**
 * JsArray an abstract class gives the array methods
 *
 * @since   1.0.0
 */
class JsArray extends JsBase implements
	\IteratorAggregate,
	\ArrayAccess,
	\Countable,
	\Serializable,
	\JsonSerializable
{
	/**
	 * Import Array traits
	 */
	use ArrayBasicsTrait;
	use ArrayModifierTrait;
	use ArraySearchingTrait;
	use ArrayConditionalTrait;
	use ArrayIteratorTrait;

	/**
	 * Length of the array. This value will be calculated at every time a new
	 * instance is created or bind
	 *
	 * @var		integer		$length		The length of the array
	 * @since	1.0.0
	 */
	public $length = 0;

	/**
	 * Constructor function
	 *
	 * @param	array	$elements	The array of elements
	 *
	 * @since	1.0.0
	 */
	public function __construct(array $elements = [])
	{
		$this->length = count($elements);

		parent::__construct($elements);
	}


	/**
	 * Bind the elements which are being modified
	 *
	 * @param	array|object|string		$elements		The elements are being modified
	 * @param	boolean					$makeMutable	If true then bind will mutate the array, Otherwise it will create a new array.
	 *
	 * @return	self
	 * @since	1.0.0
	 */
	public function bind($elements, $makeMutable = true) : self
	{
		parent::bind($elements, $makeMutable);

		/**
		 * If makeMutable is enabled then it update the data of the
		 * current object and mutate the previous values.
		 */
		if ($makeMutable)
		{
			// Update the length of the array
			$this->length = count($elements);

			$instance = $this;
		}
		else
		{
			$instance = new $this($elements);
		}

		return $instance;
	}

	/**
	 * Get the length of the array.
	 * This is an alias of the `length` property
	 *
	 * @return	integer		The array length
	 * @since	1.0.0
	 */
	public function length() : int
	{
		$this->check();

		return count($this->get());
	}

	/**
	 * Get the keys of an array
	 *
	 * @return	array	The keys array
	 * @since	1.0.0
	 */
	public function keys()
	{
		$this->check();
		$elements = $this->get();

		return array_keys($elements);
	}

	/**
	 * Get the values of an array
	 *
	 * @return	array	The keys array
	 * @since	1.0.0
	 */
	public function values()
	{
		$this->check();
		$elements = $this->get();

		return array_values($elements);
	}

	/**
	 * Check if the array is an associative array or sequential array.
	 *
	 * @param	array	$array	The array to check
	 *
	 * @return	boolean			True if is an associative array, False otherwise.
	 * @since	1.0.0
	 */
	public static function isAssociativeArray($array) : bool
	{
		/**
		 * If the array is an instance of this class then retrieve the original array
		 */
		if ($array instanceof self)
		{
			$array = $array->get();
		}

		/**
		 * If an empty array then it's not an associative array
		 */
		if ([] === $array)
		{
			return false;
		}

		/**
		 * If the the array has all integer numbered index then it's
		 * not an associative array
		 */
		$integerKeys = 0;

		foreach (array_keys($array) as $key)
		{
			if ($key === (int) $key)
			{
				++$integerKeys;
			}
		}

		if ($integerKeys === count(array_keys($array)))
		{
			return false;
		}

		return true;
	}

	/**
	 * Check if the item is an array or not
	 *
	 * @param	array|JsArray	$array	PHP array or instance of JsArray
	 *
	 * @return	boolean			True if it's an array, false otherwise.
	 * @since	1.0.0
	 */
	public static function isArray($array) : bool
	{
		/**
		 * If the array is an instance of this class then retrieve the original array
		 */
		if ($array instanceof self)
		{
			$array = $array->get();
		}

		return is_array($array);
	}

	/**
	 * @see 	\IteratorAggregate::getIterator()
	 *
	 * Make the JsArray instance iterable.
	 * Now one can iterate the JsArray instance using foreach
	 *
	 * @return	\Iterator
	 * @since	1.0.0
	 */
	public function getIterator()
	{
		$this->check();
		$elements = $this->get();

		return new \ArrayIterator($elements);
	}

	/**
	 * @see 	\ArrayAccess::offsetExists($offset)
	 *
	 * This will check if a specific key is exists in the elements array.
	 *
	 * @param	string|int	$key	The key to check.
	 *
	 * @return	boolean		True if key exists on the elements array, false otherwise.
	 * @since	1.0.0
	 */
	public function offsetExists($key) : bool
	{
		$elements = $this->get();

		return isset($elements[$key]);
	}

	/**
	 * @see 	\ArrayAccess::offsetSet($offset, $value)
	 *
	 * Set an value by using a specific offset.
	 *
	 * @param	string|int	$key		The offset key
	 * @param	mixed		$value		The value to set at the offset position
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function offsetSet($key, $value) : void
	{
		$elements = $this->get();

		/**
		 * If key no key provided then push the value into the array,
		 * otherwise it sets a value at the specific key.
		 * If key already exists then it updates the value, otherwise insert.
		 */
		if (is_null($key))
		{
			$elements[] = $value;
		}
		else
		{
			$elements[$key] = $value;
		}

		// Bind and mutate the elements array by new array after setting the offset
		$this->bind($elements);
	}

	/**
	 * @see 	\ArrayAccess::offsetGet($offset)
	 *
	 * @param	string|int		$key	The key of the array value to get.
	 *
	 * @return	mixed			If key found then return the value, otherwise returns null
	 * @since	1.0.0
	 */
	public function offsetGet($key)
	{
		$elements = $this->get();

		return isset($elements[$key]) ? $elements[$key] : null;
	}

	/**
	 * @see		\ArrayAccess::offsetUnset($offset)
	 *
	 * This is to unset a specific offset or key of the array.
	 *
	 * @param	string|int	$key	The key to unset the element
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function offsetUnset($key) : void
	{
		$elements = $this->get();

		if ($this->offsetExists($key))
		{
			unset($elements[$key]);

			if (!self::isAssociativeArray($elements))
			{
				$elements = array_values($elements);
			}

			$this->bind($elements);
		}
	}

	/**
	 * @see		Countable::count()
	 *
	 * Count the total number of elements of the array.
	 *
	 * @return	integer		The length of the array
	 * @since	1.0.0
	 */
	public function count() : int
	{
		return $this->length;
	}

	/**
	 * @see		\Serializable::serialize()
	 *
	 * Serialize the object.
	 *
	 * @return	string		The serialized string.
	 * @since	1.0.0
	 */
	public function serialize() : string
	{
		$elements = $this->get();

		return serialize($elements);
	}

	/**
	 * @see		\Serializable::unserialize(string $serialized)
	 *
	 * Unserialize a serialized string and retrieve the array.
	 *
	 * @param	string	$serialized		The serialized string
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function unserialize($serialized) : void
	{
		if (!empty($serialized))
		{
			$unserialize = null;

			try
			{
				$unserialize = unserialize($serialized);
			}
			catch (\Exception $e)
			{
				throw new \InvalidArgumentException(sprintf($e->getMessage()));
			}

			$this->bind($unserialize);
		}
		else
		{
			throw new \InvalidArgumentException(sprintf('You have to pass serialized string to unserialize.'));
		}
	}

	/**
	 * @see		\JsonSerializable::jsonSerialize()
	 *
	 * This method is called when the json_encode/json_decode is called.
	 *
	 * @return	array	The elements array
	 * @since	1.0.0
	 */
	public function jsonSerialize()
	{
		return $this->get();
	}

	/**
	 * Destructing method.
	 * This is used here to collect all the remaining garbage cycles.
	 *
	 * @since	1.0.0
	 */
	public function __destruct()
	{
		// Forces collection of any existing garbage cycles
		gc_collect_cycles();
	}

	/**
	 * Magic method __toString
	 *
	 * @return	string	Object echo message
	 * @since	1.0.0
	 */
	public function __toString()
	{
		return sprintf('For chaining method like map, filter, reduce, fill you have to call the function `get()` for getting the value.');
	}

	/**
	 * Magic method __debugInfo
	 *
	 * @return	string	Object echo message
	 * @since	1.0.0
	 */
	public function __debugInfo()
	{
		return $this->get();
	}
}
