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
    
    /**
     * @dataProvider    objectKeysProvider()
     */
    public function testObjectKeys($data, $result)
    {
        $keys = JsObject::keys($data);
        $this->assertEquals($keys, (new JsArray($result)));
    }
}