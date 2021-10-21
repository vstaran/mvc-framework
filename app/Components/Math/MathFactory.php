<?php


namespace app\Components\Math;


class MathFactory extends \framework\Components\ComponentFactoryAbstract
{

    protected function getConcrete()
    {
        return new Math();
    }
}