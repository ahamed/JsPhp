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
}