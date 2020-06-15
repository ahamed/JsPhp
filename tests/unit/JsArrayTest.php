<?php

use Ahamed\JsPhp\JsArray;
use PHPUnit\Framework\TestCase;

class JsArrayTest extends TestCase
{
	/** --------------Data Providers-------------------- */

	public function lengthProvider()
	{
		return [
			[[1, 2, 3, 4, 5], 5],
			[['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], 6],
			[[], 0],
			[['one' => 1, 'two' => 2, 'three' => 3], 3]
		];
	}

	public function arrayKeysProvider()
	{
		return [
			[[1, 2, 3, 4, 5], [0, 1, 2, 3, 4]],
			[['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], [0, 1, 2, 3, 4, 5]],
			[[], []],
			[['one' => 1, 'two' => 2, 'three' => 3], ['one', 'two', 'three']],
			[['one' => 1, 'two' => 2, 'three' => 3, 4, 5, 'six' => 6, 'seven' => 7], ['one', 'two', 'three', 0, 1, 'six', 'seven']],
		];
	}

	public function arrayValuesProvider()
	{
		return [
			[[1, 2, 3, 4, 5], [1, 2, 3, 4, 5]],
			[['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']],
			[[], []],
			[['one' => 1, 'two' => 2, 'three' => 3], [1, 2, 3]],
			[['one' => 1, 'two' => 2, 'three' => 3, 4, 5, 'six' => 6, 'seven' => 7], [1, 2, 3, 4, 5, 6, 7]],
		];
	}

	public function assocArrayProvider()
	{
		return [
			[[1, 2, 3, 4, 5], false],
			[['Jan', 'Feb', 'Mar', 'Apr'], false],
			[[], false],
			[['one' => 1, 'two' => 2, 'three' => 3], true],
			[['one' => 1, 'two' => 2, 'three' => 3, 4, 5, 'six' => 6, 'seven' => 7], true],
			[['1' => 'Earth', '4' => 'Jupiter', '2' => 'Mars', '3' => 'Sun'], false],
			[['days' => [1, 2, 3], 'months' => ['Jan', 'Feb', 'Mar'], 'year' => [2020, 2019, 2018]], true]
		];
	}

	public function setOffsetProvider()
	{
		return [
			[[], null, 5],
			[[1, 2, 3], 3, 10],
			[['name' => 'John Doe', 'email' => 'jon@doe.com'], 'age', 24],
			[['Jan', 'Feb', 'Mar'], null, 'Apr']
		];
	}

	/** --------------------Test Functions from here-------------------- */

	public function testBindIsAnInstanceOfJsArray()
	{
		$array = new JsArray;

		$this->assertInstanceOf(JsArray::class, $array->bind([1, 2, 3, 4, 5]));
	}

	public function testBindMakesANewInstanceIfMakeMutableIsFalseOtherwiseItMutateTheCurrentInstance()
	{
		$array = new JsArray;

		$this->assertSame($array, $array->bind([1, 2, 3, 4, 5]));
		$this->assertNotSame($array, $array->bind([1, 2, 3, 4, 5], false));
	}

	/**
	 * @dataProvider	lengthProvider()
	 */
	public function testLengthProperty($data, $result)
	{
		$array = new JsArray($data);
		$this->assertEquals($result, $array->length);
	}

	/**
	 * @dataProvider	lengthProvider()
	 */
	public function testLengthMethod($data, $result)
	{
		$array = new JsArray($data);
		$this->assertEquals($result, $array->length());
	}

	/**
	 * @dataProvider	arrayKeysProvider()
	 */
	public function testArrayKeys($data, $result)
	{
		$array = new JsArray($data);
		$this->assertEquals($result, $array->keys());
	}

	/**
	 * @dataProvider	arrayValuesProvider()()
	 */
	public function testArrayValues($data, $result)
	{
		$array = new JsArray($data);
		$this->assertEquals($result, $array->values());
	}

	/**
	 * @dataProvider	assocArrayProvider()
	 */
	public function testIsAssociativeArray($data, $result)
	{
		$array = new JsArray($data);

		if ($result)
		{
			$this->assertTrue(JsArray::isAssociativeArray($data));
			$this->assertTrue(JsArray::isAssociativeArray($array));
		}
		else
		{
			$this->assertFalse(JsArray::isAssociativeArray($data));
			$this->assertFalse(JsArray::isAssociativeArray($array));
		}
	}

	/**
	 * @dataProvider	assocArrayProvider()
	 */
	public function testIsArray($data)
	{
		$array = new JsArray($data);
		$this->assertTrue(JsArray::isArray($data));
		$this->assertTrue(JsArray::isArray($array));
	}

	public function testArrayIsIteratable()
	{
		$array = new JsArray([1, 2, 3, 4, 5]);

		$this->assertInstanceOf(\Traversable::class, $array);
	}

	public function testOffsetExistsReturnsBoolean()
	{
		$array = new JsArray(['one' => 1, 'two' => 2, 'three' => 3]);

		$this->assertIsBool(isset($array['one']));
		$this->assertIsBool(isset($array['four']));
	}
	/**
	 * @dataProvider	setOffsetProvider()
	 */
	public function testOffsetSet($data, $key, $value)
	{
		$array = new JsArray($data);

		if (\is_null($key))
		{
			$array[] = $value;
			$key = $array->length - 1;
		}
		else
		{
			$array[$key] = $value;
		}

		$this->assertEquals($array[$key], $value);
	}
}
