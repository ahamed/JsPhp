<?php

use Ahamed\JsPhp\JsArray;
use PHPUnit\Framework\TestCase;

class JsArrayTest extends TestCase
{
	protected function setUp() : void
	{
		$this->plainArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];
		$this->plainAssoc = ['firstName' => 'John', 'lastName' => 'Doe', 'email' => 'john@example.com', 'age' => 24];
		$this->plainHybrid = ['day' => 2, 'month' => 5, 'mango', 'apple', 'year' => 2020];
		$this->plainUnordered = ['3' => 'three', '2' => 'two', '5' => 'five', '4' => 'four', '1' => 'one'];

		$this->array = new JsArray(['Jan', 'Feb', 'Mar', 'Apr', 'May']);
		$this->assocArray = new JsArray(['firstName' => 'John', 'lastName' => 'Doe', 'email' => 'john@example.com', 'age' => 24]);
		$this->hybridArray = new JsArray(['day' => 2, 'month' => 5, 'mango', 'apple', 'year' => 2020]);
		$this->unorderedIntegerIndexedArray = new JsArray(['3' => 'three', '2' => 'two', '5' => 'five', '4' => 'four', '1' => 'one']);
	}

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

	public function testLengthMethodReturnsTheLengthOfTheArray()
	{
		$array = new JsArray([1, 2, 3, 4, 5]);

		$this->assertEquals(5, $array->length());
	}

	public function testLengthPropertyReturnsTheLengthOfTheArray()
	{
		$array = new JsArray([1, 2, 3, 4, 5]);
		$this->assertEquals(5, $array->length);
	}

	public function testKeysMethodReturnsTheKeysOfTheArray()
	{
		$this->assertEquals([0, 1, 2, 3, 4], $this->array->keys());
		$this->assertEquals(['firstName', 'lastName', 'email', 'age'], $this->assocArray->keys());
		$this->assertEquals(['day', 'month', 0, 1, 'year'], $this->hybridArray->keys());
	}

	public function testValuesMethodReturnsTheValuesOftheArray()
	{
		$this->assertEquals(['Jan', 'Feb', 'Mar', 'Apr', 'May'], $this->array->values());
		$this->assertEquals(['John', 'Doe', 'john@example.com', 24], $this->assocArray->values());
		$this->assertEquals([2, 5, 'mango', 'apple', 2020], $this->hybridArray->values());
	}

	public function testStaticMethodIsAssocicateArrayReturnsTrueOnAssociateArrayAndFalseOnSequentialArray()
	{
		$this->assertFalse(JsArray::isAssociativeArray($this->array));
		$this->assertTrue(JsArray::isAssociativeArray($this->assocArray));
		$this->assertTrue(JsArray::isAssociativeArray($this->hybridArray));
		$this->assertFalse(JsArray::isAssociativeArray($this->unorderedIntegerIndexedArray));

		$this->assertFalse(JsArray::isAssociativeArray($this->plainArray));
		$this->assertTrue(JsArray::isAssociativeArray($this->plainAssoc));
		$this->assertTrue(JsArray::isAssociativeArray($this->plainHybrid));
		$this->assertFalse(JsArray::isAssociativeArray($this->plainUnordered));
	}

	public function testStaticMethodIsArrayReturnsTrueOnIsArrayFalseOtherwise()
	{
		$this->assertFalse(JsArray::isArray(5));
		$this->assertFalse(JsArray::isArray('string'));
		$this->assertTrue(JsArray::isArray($this->assocArray));
		$this->assertTrue(JsArray::isArray($this->hybridArray));

		$this->assertTrue(JsArray::isArray($this->plainAssoc));
		$this->assertTrue(JsArray::isArray($this->plainHybrid));
	}
}
