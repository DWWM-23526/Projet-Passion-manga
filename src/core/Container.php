<?php 

namespace core;

use Exception;

class Container {

    protected array $container = [];

    public function setContainer(string $key,$value)
    {
        $this->container[$key] = $value;
    }

    public function getContainer(mixed $key)
    {

        if (!array_key_exists($key, $this->container)) {
            throw new Exception("Error {$key} does not exist");
        }
        $value = $this->container[$key];
        return call_user_func($value);
    }


}