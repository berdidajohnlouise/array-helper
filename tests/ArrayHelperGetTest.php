<?php

use Berdidajohnlouise\ArrayHelper\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperGetTest extends TestCase
{
    public function test_get_item_from_array()
    {
        $array = ['user' => ['name' => 'Jane', 'email' => 'jane@example.com']];

        $arrayHelpers = new ArrayHelper($array);

        $this->assertEquals('Jane', $arrayHelpers->get('user.name'));

        $array = ['name' => 'John', 'age' => 30, 'city' => 'New York'];

        $arrayHelpers = new ArrayHelper($array);


        $this->assertEquals('John', $arrayHelpers->get('name'));
        $this->assertEquals(30, $arrayHelpers->get('age'));
        $this->assertEquals('New York', $arrayHelpers->get('city'));

        $this->assertNull($arrayHelpers->get('gender'));
        $this->assertNull($arrayHelpers->get('address'));
    }
}