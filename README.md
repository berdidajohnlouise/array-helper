# ArrayHelper - Simplify Array Operations in PHP.

ArrayHelper is a powerful PHP package that provides a collection of functions to simplify common array operations, making array manipulation a breeze. 

With ArrayHelper, you can perform various tasks such as sorting arrays, merging arrays, retreiving values by keys, checking array presence or emptiness and manipulating aray structures.

## Features

- sort() - Easily sort arrays based on properties or values in both ascending and descending order.
- merge() - Merge multiple arrays into a single array, combining their elements.
- get() - Retrieve values from arrays using keys or complex paths.
- has() - Determine if an array contains a specific key or value.
- Support for Associative and Indexed Arrays: Arrayhelper works seamlessly with both associative and indexed arrays.

## Installation

You can install the ArrayHelper package via Composer. Run the following command in your terminal:
```bash
    $ composer require berdidajohnlouise/array-helper
```

## Usage

### ArrayHelper sort()
- Easily sort arrays based on properties or values in both ascending and descending order.
```php
    use Berdidajohnlouise\ArrayHelper;

    /**
     * Method sorting arrays by associative or indexed array
     *
     * @param string $property => string | null
     * @param bool $isAscending  => true | false | default value => true
     *
     * @return array ascending || descending
     */
    
    // Sorting Indexed Arrays. 
    $array = [5,3,1,4,2];
    $arrayHelper = new ArrayHelper($array);
    // Sort Ascending
    $sortedIndexArray = $arrayHelper->sort();
    // Output: [1,2,3,4,5]

    // Sort Descending
    $sortedIndexArray = $arrayHelper->sort(null,false);
    // Output: [5,4,3,2,1]


    // Sorting Via Associative Array
    $array = [
            ['name' => 'John', 'age' => 30],
            ['name' => 'Jane', 'age' => 25],
            ['name' => 'Bob', 'age' => 35],
        ];

    $arrayHelper = new ArrayHelper($array);
    
    // Sort Associative array order by ascending default
    $sortedArrayAsc = $arrayHelper->sort('age');
    // Output = [
    //        ['name' => 'Jane', 'age' => 25],
    //        ['name' => 'John', 'age' => 30],
    //        ['name' => 'Bob', 'age' => 35],
    // ]

    // Sort Associative array order by ascending default
    $sortedArrayAsc = $arrayHelper->sort('age',false);
    // Output = [
    //        ['name' => 'Bob', 'age' => 35],
    //        ['name' => 'John', 'age' => 30],
    //        ['name' => 'Jane', 'age' => 25],
    // ]

```

### Array get()
- Retrieve values from arrays using keys or complex paths.
```php
    use Berdidajohnlouise\ArrayHelper;
    /**
    * Method get for retrieving a value from an array using a dot-separated key or direct array key. 
    *
    * @param string $key => dot separated or direct array key
    *
    * @return void
    */
    $array = ['user' => ['name' => 'Jane', 'email' => 'jane@example.com']];
    $arrayHelper = new ArrayHelper($array);
    $value = $arrayHelper->get('user.name');
    // Output: Jane
    OR
    $array = ['name' => 'John', 'age' => 30, 'city' => 'New York'];
    $arrayHelper = new ArrayHelper($array);
    $value = $arrayHelper->get('name');
    // Output: John
```

### Array has()
- Determine if an array contains a specific key or value.

```php
    use Berdidajohnlouise\ArrayHelper;
    /**
    * Method has that checks an array if has a certain key.
    *
    * @param $key $key 
    *
    * @return bool
    */

    $array = ['name' => 'John', 'age' => 30, 'city' => 'New York'];

    $arrayHelpers = new ArrayHelper($array);
    $arrayHelpers->has('name');
    // Output: True
    $arrayHelpers->has('gender');
    // Output: False

```

### Array merge()
- Merge multiple arrays into a single array, combining their elements.

```php
    /**
     * Method merge arrays helper function
     *
     * @param ...$arrays $arrays [can accept multiple param arrays]
     *
     * @return array
     */

    $array1 = ['name' => 'John', 'age' => 30];
    $array2 = ['city' => 'New York', 'country' => 'USA'];
    $array3 = ['occupation' => 'Developer'];

    // Without instantiating of array in constructor
    $arrayHelpers = new ArrayHelper;
    $mergedArray = $arrayHelpers->merge($array1, $array2, $array3);
    // Output = [
    //    'name' => 'John',
    //    'age' => 30,
    //    'city' => 'New York',
    //    'country' => 'USA',
    //    'occupation' => 'Developer',
    // ]

    // instantiating of array in constructor
    $arrayHelpers = new ArrayHelper($array1);
    $mergedArray = $arrayHelpers->merge($array2, $array3);
    // Output = [
    //    'name' => 'John',
    //    'age' => 30,
    //    'city' => 'New York',
    //    'country' => 'USA',
    //    'occupation' => 'Developer',
    // ]

```

## Contributing
Contributions are welcome! If you find a bug or want to add new features, please submit an issue or a pull request on the GitHub repository.

## Credits
ArrayHelper is developed and maintained by [Berdida John Louise](https://github.com/berdidajohnlouise)