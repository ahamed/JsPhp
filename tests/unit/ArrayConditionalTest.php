<?php

use Ahamed\JsPhp\JsArray;
use PHPUnit\Framework\TestCase;

class ArrayConditionalTest extends TestCase
{
	public function conditionalDataProvider()
	{
		return [
			[[1, 2, 3, 4, 5], '$item <= 5', true],
			[['Jan', 'Feb', 'Mar', 'Apr'], 'strlen($item) === 3', true],
			[[-1, 0, 10, 20, -100, 2, 5], '\is_numeric($item)', true],
			[[-1, 0, 10, 20, -100, 2, 5], '$item > 0', false],
			[[0.5, .23, 4, 0.000000002, 1e5, 0.0], '\is_numeric($item)', true],
			[['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5], 'strlen($key) >= 3', true],
			[['one' => 1, 'two' => 2, 3, 4, 'five' => 5, 'six', 'seven', 8.0], '\is_numeric($key)', false],
		];
	}

	/**
	 * @dataProvider	conditionalDataProvider()
	 */
	public function testJsArrayEvery($data, $condition, $result)
	{
		$array = new JsArray($data);

		$isEvery = $array->every(
			function ($item, $index, $key) use ($condition) {
				return eval("return " . $condition . ";");
			}
		);

		if ($result)
		{
			$this->assertTrue($isEvery);
		}
		else
		{
			$this->assertFalse($isEvery);
		}
	}
}
