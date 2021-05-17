<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits\Arrays;

use Ahamed\JsPhp\JsArray;
use Ahamed\JsPhp\Utilities;

/**
 * Trait for array sorting
 *
 * @since   1.0.0
 */
trait SortingTrait
{
	/**
	 * Method for sorting an array.
	 *
	 * @param	callable		$callback	Callback function for the sort
	 *
	 * @return	JsArray		The sorted array.
	 * @since	1.0.0
	 */
	public function sort(callable $callback = null)
	{
		$sorted = Utilities::mergeSort($this, $callback);

		if ($sorted instanceof JsArray)
		{
			$this->bind($sorted->get());
		}
		elseif (\is_array($sorted))
		{
			$this->bind($sorted);
		}

		return $this;
	}
}
