<?php

use Berdidajohnlouise\ArrayHelper\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperSortTest extends TestCase
{
    public function test_sort_by_array_with_associative_array(){
        $array = [
            ['name' => 'John', 'age' => 30],
            ['name' => 'Jane', 'age' => 25],
            ['name' => 'Bob', 'age' => 35],
        ];

        $arrayHelper = new ArrayHelper($array);
        
        // Sort Associative array order by ascending default
        $sortedArrayAsc = $arrayHelper->sort('age');
        $expectedArrayAsc = [
            ['name' => 'Jane', 'age' => 25],
            ['name' => 'John', 'age' => 30],
            ['name' => 'Bob', 'age' => 35],
        ];


         // Sort Associative array order by descending.
        $this->assertEquals($expectedArrayAsc, $sortedArrayAsc);

        $expectedArrayDesc = [
            ['name' => 'Bob', 'age' => 35],
            ['name' => 'John', 'age' => 30],
            ['name' => 'Jane', 'age' => 25],
        ];

        $sortedArrayDesc = $arrayHelper->sort('age',false);

        $this->assertSame($expectedArrayDesc, $sortedArrayDesc);

    }

    public function test_sort_with_index_array(){
        $array = ['John', 'Jane', 'Bob'];

        // Sort Index array order by ascending default
        $arrayHelper = new ArrayHelper($array);
        $sortedArrayAsc = $arrayHelper->sort();
        $expectedArrayAsc = ['Bob','Jane','John'];

        $this->assertEquals($expectedArrayAsc, $sortedArrayAsc);

        // Sort Index array order by descending.
        $sortedArrayDesc = $arrayHelper->sort(null,false);
        $expectedArrayDesc = ['John','Jane','Bob'];

        $this->assertEquals($expectedArrayDesc, $sortedArrayDesc);

    }
}