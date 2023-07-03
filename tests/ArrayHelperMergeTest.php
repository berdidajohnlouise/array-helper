<?php
use Berdidajohnlouise\ArrayHelper\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperMergeTest extends TestCase
{
    public function test_merge_arrays_without_initializing_constructor_params(){
        
        $array1 = ['name' => 'John', 'age' => 30];
        $array2 = ['city' => 'New York', 'country' => 'USA'];
        $array3 = ['occupation' => 'Developer'];

        $arrayHelpers = new ArrayHelper;
        $mergedArray = $arrayHelpers->merge($array1, $array2, $array3);

        $expectedArray = [
            'name' => 'John',
            'age' => 30,
            'city' => 'New York',
            'country' => 'USA',
            'occupation' => 'Developer',
        ];

        $this->assertEquals($expectedArray, $mergedArray);

    }

    public function test_merge_arrays_with_initializing_constructor_params(){
        $array1 = ['name' => 'John', 'age' => 30];
        $array2 = ['city' => 'New York', 'country' => 'USA'];
        $array3 = ['occupation' => 'Developer'];

        $arrayHelpers = new ArrayHelper($array1);
        $mergedArray = $arrayHelpers->merge($array2, $array3);

        $expectedArray = [
            'name' => 'John',
            'age' => 30,
            'city' => 'New York',
            'country' => 'USA',
            'occupation' => 'Developer',
        ];

        $this->assertEquals($expectedArray, $mergedArray);
    }
}