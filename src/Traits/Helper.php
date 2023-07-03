<?php
namespace Berdidajohnlouise\ArrayHelper\Traits;

trait Helper
{
    public function isAssociativeArray(array $array): bool
    {
        if (!is_array($array)) {
            return false;
        }
    
        if (array_keys($array) !== range(0, count($array) - 1)) {
            return true; // Associative array
        }
    
        foreach ($array as $value) {
            if (is_array($value) && $this->isAssociativeArray($value)) {
                return true; // Multidimensional associative array
            }
        }
    
        return false; // Neither associative nor multidimensional associative array
    }

    public function isPropertyExists(array $array, string $property): bool
    {
        return array_key_exists($property, reset($array));
    }
}