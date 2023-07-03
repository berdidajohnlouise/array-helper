<?php
namespace Berdidajohnlouise\ArrayHelper\Contracts;

interface ArrayHelperContract
{
    public function get(string $key);

    public function has($key): bool;

    public function merge(...$arrays): array;

    public function sort(string $property,bool $isAscending): array;
 

}