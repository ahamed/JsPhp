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
trait ArrayConditionalTrait
{
	/**
	 * Every is a function which returns a boolean value if every value of an array has passed
	 * a specific condition,
	 *
	 * @param	func	$callback	The callback function which defines the rule. If each and
	 * 								every element of the array has passed the rule then it returns
	 * 								true. Otherwise it returns false.
	 *
	 * @return	boolean				True if each and every element passes the condition, false otherwise.
	 * @since	1.0.0
	 */
	public function every($callback)
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		$passed = 0;
		$length = $this->length();

		foreach ($elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);

			if (!empty($condition))
			{
				$passed++;
			}
		}

		return $passed === $length;
	}

	/**
	 * Some is a function which returns a boolean value if only one element of an array has passed
	 * a specific condition,
	 *
	 * @param	func	$callback	The callback function which defines the rule. If any element
	 * 								of the array has passed the rule then it returns
	 * 								true. If all elements fail the test then returns false.
	 *
	 * @return	boolean				True if only one element passes the condition, false if all elements fail the test otherwise.
	 * @since	1.0.0
	 */
	public function some($callback)
	{
		$this->isCallable($callback);
		$this->check();

		$elements = $this->get();

		$passed = false;

		foreach ($elements as $key => $item)
		{
			$condition = \call_user_func_array($callback, [$item, $key]);

			if (!empty($condition))
			{
				$passed = true;
				break;
			}
		}

		return $passed;
	}
}