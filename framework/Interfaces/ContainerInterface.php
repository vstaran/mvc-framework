<?php


namespace framework\Interfaces;


interface ContainerInterface
{
    public function get($key);

    public function set($key, $value);
}