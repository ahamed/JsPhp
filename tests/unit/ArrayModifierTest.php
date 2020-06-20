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

    /**
     * @dataProvider    fillDataProvider()
     */
    public function testModifierFill($data, $value, $range, $result)
    {
        $array = new JsArray($data);
        $array->fill($value, ...$range);
        $this->assertEquals((new JsArray($result)), $array);
    }
}