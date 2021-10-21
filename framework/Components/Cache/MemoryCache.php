<?php

namespace framework\Components\Cache;


use framework\Interfaces\CacheInterface;

class MemoryCache implements CacheInterface
{
    protected $storage = [];

    public function put($key, $value)
    {
        $this->storage[$key] = $value;
    }

    public function get($key)
    {
        return $this->storage[$key] ?? null;
    }
}