<?php


namespace framework\Components\Cache;


use framework\Components\ComponentFactoryAbstract;

class MemoryCacheFactory extends ComponentFactoryAbstract
{
    protected function getConcrete()
    {
        return new MemoryCache();
    }
}