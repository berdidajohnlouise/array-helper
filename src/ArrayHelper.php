<?php
namespace Berdidajohnlouise\ArrayHelper;

use Berdidajohnlouise\ArrayHelper\Contracts\ArrayHelperContract;
use Berdidajohnlouise\ArrayHelper\Traits\Helper;
use Throwable;

/**
 * ArrayHelpers
 */
class ArrayHelper implements ArrayHelperContract
{
    use Helper;
    
    /**
     * array
     *
     * @var mixed
     */
    private $array;
    
    /**
     * Method __construct
     *
     * @param &$array $array 
     *
     * @return void
     */
    public function __construct(&$array = [])
    {
        $this->array = $array;
    }
    
    /**
     * Method get for retrieving a value from an array using a dot-separated key or direct array key. 
     *
     * @param string $key 
     *
     * @return void
     */
    public function get(string $key)
    {
        if (array_key_exists($key, $this->array)) {
            return $this->array[$key];
        }

        $segments = explode('.', $key);

        foreach ($segments as $segment) {
            if (!is_array($this->array) || !array_key_exists($segment, $this->array)) {
                return null;
            }

            $this->array = $this->array[$segment];
        }

        return $this->array;
    }
    
    /**
     * Method has that checks an array if has a certain key.
     *
     * @param $key $key 
     *
     * @return bool
     */
    public function has($key): bool
    {
        return array_key_exists($key,$this->array);
    }
    
    /**
     * Method merge arrays helper function
     *
     * @param ...$arrays $arrays [can accept multiple param arrays]
     *
     * @return array
     */
    public function merge(...$arrays): array
    {
        $mergedArray = $this->array;
        foreach ($arrays as $array){
            if(!is_array($array)){
                throw new \InvalidArgumentException("Invalid argument. Expected an array.");
            }

            $mergedArray = array_merge($mergedArray, $array);
        }

        return $mergedArray;
    }

    
    /**
     * Method sorting arrays by associative or indexed array
     *
     * @param string $property 
     * @param bool $isAscending 
     *
     * @return array
     */
    public function sort(string $property = null, bool $isAscending = true): array
    {
        try {

            if($this->isAssociativeArray($this->array)){

                if(!$this->isPropertyExists($this->array,$property)) throw new \InvalidArgumentException("Property '{$property}' does not exist in the array.");
                usort($this->array, function ($valA, $valB) use ($property, $isAscending) {
                    $valueA = $valA[$property];
                    $valueB = $valB[$property];

                    if ($valueA === $valueB) return 0;
                    if ($isAscending) return ($valueA < $valueB) ? -1 : 1;

                    return ($valueA > $valueB) ? -1 : 1;
                });
            }else{
               $isAscending ? sort($this->array) : rsort($this->array);
            }

            return $this->array;
        } catch (Throwable $e) {

            // Returning unsorted array in case of an error
            return $this->array;
        }
    }


}