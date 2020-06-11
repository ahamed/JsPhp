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
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();
		$findValue = null;

		foreach ($elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);
			$condition = !empty($condition);

			if ($condition)
			{
				$findValue = $item;
				break;
			}
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
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();
		$findValue = null;

		$keys = array_keys($elements);
		$length = $this->length();

		for ($i = $length - 1; $i >= 0; $i--)
		{
			$condition = \call_user_func_array($callback, [$elements[$i], $keys[$i]]);

			if (!empty($condition))
			{
				$findValue = $elements[$i];
				break;
			}
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
	 * @return	mixed				Searched value if found. -1 otherwise.
	 * @since	1.0.0
	 */
	public function findIndex($callback)
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		$index = 0;
		$findIndex = -1;

		foreach ($elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);

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
	 * @return	mixed				Searched value if found. -1 otherwise.
	 * @since	1.0.0
	 */
	public function findLastIndex($callback)
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		$index = 0;
		$findLastIndex = -1;
		$keys = array_keys($elements);
		$length = $this->length();

		for ($i = $length - 1; $i >= 0; $i--)
		{
			$condition = \call_user_func_array($callback, [$elements[$i], $keys[$i]]);
			$condition = !empty($condition);

			if (!empty($condition))
			{
				$findLastIndex = ($length - 1) - $index;
				break;
			}

			$index++;
		}

		return $findLastIndex;
	}
}
