<?php


namespace App;


class Invest extends InvestSet
{
    /**
     * @return Invest
     */
    public static function start(): Invest
    {
        return new self;
    }
}