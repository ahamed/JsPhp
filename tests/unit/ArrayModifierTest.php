<?php

use Ahamed\JsPhp\JsArray;
use PHPUnit\Framework\TestCase;

class ArrayModifierTest extends TestCase
{
    public function fillDataProvider()
    {
        return [
            [[1, 2, 3, 4, 5, 6], 0, [null, null], [0, 0, 0, 0, 0, 0]],
            [[1, 2, 3, 4, 5, 6], -1, [2, null], [1, 2, -1, -1, -1, -1]],
            [[1, 2, 3, 4, 5, 6], 'a', [1, 4], [1, 'a', 'a', 'a', 5, 6]],
            [[1, 2, 3, 4, 5, 6], 0, [-3, null], [1, 2, 3, 0, 0, 0]],
            [[1, 2, 3, 4, 5, 6], 0, [-3, -4], [1, 2, 3, 4, 5, 6]],
            [[1, 2, 3, 4, 5, 6], 0, [1, 10], [1, 0, 0, 0, 0, 0]],
            [[1, 2, 3, 4, 5, 6], 0, [-10, null], [0, 0, 0, 0, 0, 0]],
        ];
    }

    public function reverseDataProvider()
    {
        return [
            [[1, 2, 3, 4], [4, 3, 2, 1]],
            [['a', 'b', 'c'], ['c', 'b', 'a']],
            [[], []],
            [['one' => 1, 'two' => 2, 'three' => 3], ['three' => 3, 'two' => 2, 'one' => 1]],
            [['one' => 1, 'two', 'three' => 3, 4, 5], [5, 4, 'three' => 3, 'two', 'one' => 1]]
        ];
    }

    public function flatDataProvider()
    {
        return [
            [[1, 2, 3, 4], [1, 2, 3, 4]],
            [[[1, 2, [3, 4]]], [1, 2, 3, 4]],
            [[[1, 2], [3, [4, [5, [6, [7]]]]]], [1, 2, 3, 4, 5, 6, 7]],
            [[[1, 2], [3, 4], [5, 6]], [1, 2, 3, 4, 5, 6]],
            [['one' => 1, 'two' => 2, ['three' => 3]], 'error']
        ];
    }

    /**
     * @dataProvider    fillDataProvider()
     */
    public function testModifierFill($data, $value, $range, $result)
    {
        $array = new JsArray($data);
        $array->fill($value, ...$range);
        $this->assertEquals((new JsArray($result)), $array);
    }

    /**
     * @dataProvider    reverseDataProvider()
     */
    public function testReverse($data, $result)
    {
        $array = new JsArray($data);
        
        $this->assertEquals((new JsArray($result)), $array->reverse());
    }

    /**
     * @dataProvider    flatDataProvider()
     */
    public function testFlatArray($data, $result)
    {
        $array = new JsArray($data);

        if (\is_array($result))
        {
            $this->assertEquals((new JsArray($result)), $array->flat());
        }
        elseif (\is_string($result) && $result === 'error')
        {
            $this->expectException(\UnexpectedValueException::class);
			$this->expectExceptionMessage('Flatten could not be applied to an associative array. Please use it in sequential array.');
			$this->assertEquals($result, $array->flat());
        }

    }
}