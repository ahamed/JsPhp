<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp;

use Ahamed\JsPhp\Core\JsBase;
use Ahamed\JsPhp\JsArray;
use Ahamed\JsPhp\Traits\Objects\FactoryTrait;

/**
 * JsObject the class implementation for various object methods.
 *
 */
class JsObject extends JsBase implements \ArrayAccess
{
	use FactoryTrait;

	/**
	 * Constructor function for the JsObject class
	 *
	 * @param	array|object	$elements	The elements to create the JsObject
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function __construct($elements = null)
	{
		/**
		 * If no argument provided or NULL given then make the elements as
		 * an empty \stdClass object.
		 */
		if (\is_null($elements))
		{
			$elements = new \stdClass;
		}

		/**
		 * Force user to pass a valid array|object as the argument
		 * of the constructor function of the JsObject class.
		 */
		if (!(\is_object($elements) || \is_array($elements)))
		{
			throw new \InvalidArgumentException(
				sprintf('You must have to provide Object or Array as the argument of the JsObject class, "%s" given!', ucfirst(gettype($elements)))
			);
		}

		/**
		 * If the given element is an object and it's an object of
		 * a custom class then parse the object and get all the
		 * public properties and makes a \stdClass object.
		 */
		if (\is_object($elements))
		{
			if ($elements instanceof self)
			{
				$elements = $elements->get();
			}
			elseif (!($elements instanceof \stdClass))
			{
				$elements = $this->parseObject($elements);
			}
		}
		elseif (\is_array($elements))
		{
			$elements = (object) $elements;
		}

		parent::__construct($elements);
	}

	/**
	 * Bind the elements which are being modified
	 *
	 * @param	array|object	$elements		The elements are being modified
	 * @param	boolean			$makeMutable	If true then bind will mutate the array, Otherwise it will create a new array.
	 *
	 * @return	self
	 * @since	1.0.0
	 */
	public function bind($elements, $makeMutable = true) : self
	{
		if (!isset($elements))
		{
			throw new \InvalidArgumentException(
				\sprintf('`bind()` method expects first argument a valid object or array!')
			);
		}

		if (!$makeMutable)
		{
			return (new $this($elements));
		}

		/**
		 * If the given element is an object and it's an object of
		 * a custom class then parse the object and get all the
		 * public properties and makes a \stdClass object.
		 */
		if (\is_object($elements))
		{
			if ($elements instanceof self)
			{
				$elements = $elements->get();
			}
			elseif (!($elements instanceof \stdClass))
			{
				$elements = $this->parseObject($elements);
			}
		}
		elseif (\is_array($elements))
		{
			$elements = (object) $elements;
		}

		parent::bind($elements, $makeMutable);

		if ($makeMutable)
		{
			$instance = $this;
		}

		return $instance;
	}

	/**
	 * Parse the custom class object and take only the public properties
	 * and returns a stdClass.
	 *
	 * @param	object		$elements	custom class object
	 *
	 * @return	\stdClass	A \stdClass with public properties
	 * @since	1.0.0
	 */
	private function parseObject(object $elements) : \stdClass
	{
		/**
		 * Create a \ReflectionObject instance with the $elements object
		 * and gets all the public properties.
		 */
		$reflection = new \ReflectionObject($elements);
		$properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

		$parsedObject = new \stdClass;

		/**
		 * If public properties exists then the reflection returns an array
		 * of properties. Make the array as a JsArray and get the property name
		 * and set the properties to the returning stdClass object.
		 *
		 * If no public property exists then it returns an empty stdClass.
		 */
		if (!empty($properties))
		{
			$properties = new JsArray($properties);
			$publicProperties = $properties->map(
				function ($prop) {
					return $prop->name;
				}
			);

			$publicProperties->forEach(
				function ($prop) use ($elements, $parsedObject) {
					$parsedObject->$prop = $elements->$prop;
				}
			);
		}

		return $parsedObject;
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

		return isset($elements->$key);
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
		 * One must have to pass a key for setting a value
		 */
		if (\is_null($key))
		{
			throw new \InvalidArgumentException(
				\sprintf('You must have to provide the key/property of the object to set the value.')
			);
		}
		else
		{
			$elements->$key = $value;
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

		if (isset($elements->$key))
		{
			return $elements->$key;
		}

		\trigger_error(\sprintf('Undefined index: %s', $key), \E_USER_NOTICE);

		return null;
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

		if (isset($elements->$key))
		{
			unset($elements->$key);
			$this->bind($elements);
		}
	}

	/**
	 * The magic getter method for getting the element by property.
	 *
	 * @param	string	$name	The property name
	 *
	 * @return	mixed	The value of the the elements object for the property.
	 * @throws	\NotFoundException
	 */
	public function __get($name)
	{
		$elements = $this->get();

		if (!isset($elements->$name))
		{
			throw new \Exception(
				sprintf('Unknown property "%s".', $name)
			);
		}

		return $elements->$name;
	}

	/**
	 * Magic setter method for setting/changing object property.
	 *
	 * @param	string	$name	The property name.
	 * @param	mixed	$value	The value to change/set.
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function __set($name, $value) : void
	{
		$elements = $this->get();
		$elements->$name = $value;

		$this->bind($elements);
	}

	/**
	 * Magic method __isset for checking isset()
	 *
	 * @param	string		$name	The property name.
	 *
	 * @return	boolean		true if property exists, false otherwise.
	 * @since	1.0.0
	 */
	public function __isset($name)
	{
		$elements = $this->get();

		return isset($elements->$name);
	}

	/**
	 * Magic method __unset for applying the unset() method on object property.
	 *
	 * @param	string		$name	The property name.
	 *
	 * @return	void
	 * @since	1.0.0
	 */
	public function __unset($name)
	{
		$elements = $this->get();

		if (isset($elements->$name))
		{
			unset($elements->$name);
		}
	}

	/**
	 * Magic method __toString
	 *
	 * @return	string	Object echo message
	 * @since	1.0.0
	 */
	public function __toString() : string
	{
		return sprintf('Call `get()` if a method is returning a `JsObject` instance for getting the native stdClass object.');
	}

	/**
	 * Method to run __toString() method.
	 *
	 * @return	string	The return string of __toString()
	 * @since	1.0.0
	 */
	public function toString() : string
	{
		return (string) $this;
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
	 * Magic method __debugInfo
	 *
	 * @return 	array	Object echo message
	 * @since	1.0.0
	 */
	public function __debugInfo() : array
	{
		return [
			$this->get()
		];
	}
}
