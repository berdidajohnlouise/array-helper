<?php

use Berdidajohnlouise\ArrayHelper\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperHasTest extends TestCase
{
    public function test_array_has_key(){
        $array = ['name' => 'John', 'age' => 30, 'city' => 'New York'];

        $arrayHelpers = new ArrayHelper($array);

        $this->assertTrue($arrayHelpers->has('name'));
        $this->assertTrue($arrayHelpers->has('age'));
        $this->assertTrue($arrayHelpers->has('city'));

        $this->assertFalse($arrayHelpers->has('gender'));
        $this->assertFalse($arrayHelpers->has('address'));
    }
}