<?php

use Ahamed\JsPhp\JsArray;
use PHPUnit\Framework\TestCase;

class ArrayIteratorTest extends TestCase
{
	public function testJsArrayForEach()
	{
		$data = [1, 2, 3, 4, 5];
		$array = new JsArray($data);

		$array->forEach(
			function ($item, $index) {
				$this->assertEquals($index + 1, $item);

				if ($index % 2 === 1)
				{
					$this->assertEquals($item % 2, 0);
				}
			}
		);

		$data = [[1, 2, 3], [3, 4, 5], [5, 6, 7]];
		$array = new JsArray($data);

		$array->forEach(
			function ($item, $index) {
				$this->assertInstanceOf(JsArray::class, $item);
				$this->assertIsInt($item[0]);
			}
		);
	}

	public function testJsArrayMap()
	{
		$array = new JsArray([-1, 0, 1, 2, -5, 3]);

		$mapped = $array->map(
			function ($item) {
				return $item * $item;
			}
		);

		$this->assertEquals($mapped->get(), [1, 0, 1, 4, 25, 9]);
	}

	public function testJsArrayFilter()
	{
		$array = new JsArray([1, 2, 3, 4, 5, 6]);
		$filtered = $array->filter(
			function ($item) {
				return $item % 2 === 0;
			}
		);

		$this->assertEquals((new JsArray([2, 4, 6])), $filtered);

		$array = new JsArray(['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4]);
		$filtered = $array->filter(
			function ($item, $index, $key) {
				return strlen($key) >= 4;
			}
		);

		$this->assertEquals((new JsArray(['four' => 4, 'three' => 3])), $filtered);

		$array = new JsArray(['one' => 1, 'two' => 2, 3, 4, 'five' => 5, 6]);
		$filtered = $array->filter(
			function ($item) {
				return $item > 1;
			}
		);

		$this->assertEquals((new JsArray(['two' => 2, 3, 4, 'five' => 5, 6])), $filtered);
	}
}