<?php

use Ahamed\JsPhp\JsArray;
use Ahamed\JsPhp\JsObject;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ObjectBasicsTest extends TestCase
{
    public function objectAssignProvider()
    {
        return [
            [[], [], []],
            [[], [2, 3, 5], [2, 3, 5]],
            [[], ['one' => 1, 'two' => 2, 'three' => 3], ['one' => 1, 'two' => 2, 'three' => 3]],
            [['four' => 4, 'five' => 5], ['one' => 1, 'two' => 2, 'three' => 3], ['four' => 4, 'five' => 5, 'one' => 1, 'two' => 2, 'three' => 3]],
            [['one' => 4, 'five' => 5], ['one' => 1, 'two' => 2, 'three' => 3], ['one' => 1, 'five' => 5, 'two' => 2, 'three' => 3]],
            [['one' => 1, 2, 3], [5, 6, 7], ['one' => 1, 5, 6, 7]]
        ];
    }

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
     * @dataProvider    objectAssignProvider()
     */
    public function testObjectAssign($target, $source, $result)
    {
        $merged = JsObject::assign($target, $source);
        $this->assertEquals(new JsObject($result), $merged);

        $this->expectException(InvalidArgumentException::class);
        JsObject::assign([2, 3], 'string');
        
        $this->expectException(InvalidArgumentException::class);
        JsObject::assign('string', [2, 3]);

        $merged = JsObject::assign([1, 2], [3, 4, 5], [5, 4]);
        $this->assertEquals(new JsObject([5, 4, 5]), $merged);

        $merged = JsObject::assign(['name' => 'orange'], ['name' => 'apple', 'color' => 'darkred'], ['name' => 'lemon']);
        $this->assertEquals(new JsObject(['name' => 'lemon', 'color' => 'darkred']), $merged);

        $object = new \stdClass;
        $object->name = new \stdClass;
        $object->name->first = 'John';
        $object->name->last = 'Doe';
        $object->age = 24;

        $merged = JsObject::assign($object, ['name' => 'Alice']);
        $this->assertEquals(new JsObject(['name' => 'Alice', 'age' => 24]), $merged);
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