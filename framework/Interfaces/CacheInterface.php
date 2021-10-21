<?php


namespace framework\Interfaces;


interface CacheInterface
{
    public function put($key, $value);

    public function get($key);
}