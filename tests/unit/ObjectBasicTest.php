<?php

use Ahamed\JsPhp\JsObject;
use Ahamed\JsPhp\JsArray;
use PHPUnit\Framework\TestCase;

class ObjectBasicsTest extends TestCase
{
    public function objectKeysProvider()
	{
        $stdObj = new stdClass;
        $stdObj->name = 'John Doe';
        $stdObj->email = 'john@example.com';
        $stdObj->age = 24;

		return [
			[[], []],
			[[1, 2 ,3], [0, 1, 2]],
			[['day' => 1, 'month' => 6, 'year' => 2020], ['day', 'month', 'year']],
			[['one' => 1, 'two' => 2, 'three' => 3], ['one', 'two', 'three']],
			[$stdObj, ['name', 'email', 'age']]
		];
    }

    public function objectValuesProvider()
	{
        $stdObj = new stdClass;
        $stdObj->name = 'John Doe';
        $stdObj->email = 'john@example.com';
        $stdObj->age = 24;

		return [
			[[], []],
			[[1, 2 ,3], [1, 2, 3]],
			[['day' => 1, 'month' => 6, 'year' => 2020], [1, 6, 2020]],
			[['one' => 1, 'two' => 2, 'three' => 3], [1, 2, 3]],
			[$stdObj, ['John Doe', 'john@example.com', 24]]
		];
    }

    public function objectEntriesProvider()
	{
        $stdObj = new stdClass;
        $stdObj->name = 'John Doe';
        $stdObj->email = 'john@example.com';
        $stdObj->age = 24;

		return [
			[[], []],
			[[1, 2 ,3], [[0, 1], [1, 2], [2, 3]]],
			[['day' => 1, 'month' => 6, 'year' => 2020], [['day', 1], ['month', 6], ['year', 2020]]],
			[['one' => 1, 'two' => 2, 'three' => 3], [['one', 1], ['two', 2], ['three', 3]]],
			[$stdObj, [['name', 'John Doe'], ['email', 'john@example.com'], ['age', 24]]]
		];
    }
    
    /**
     * @dataProvider    objectKeysProvider()
     */
    public function testObjectKeys($data, $result)
    {
        $keys = JsObject::keys($data);
        $this->assertEquals($keys, (new JsArray($result)));
    }

    /**
     * @dataProvider    objectValuesProvider()
     */
    public function testObjectValues($data, $result)
    {
        $values = JsObject::values($data);
        $this->assertEquals($values, (new JsArray($result)));
    }

    /**
     * @dataProvider objectEntriesProvider()
     */
    public function testObjectEntries($data, $result)
    {
        $entries = JsObject::entries($data);
        $this->assertEquals($entries, (new JsArray($result)));
    }
}