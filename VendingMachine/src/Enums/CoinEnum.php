<?php 

namespace MohamedKaram\VendingMachine\Enums;

enum CoinEnum : int
{
    case PENNY = 1;
    case NICKEL = 5;
    case DIME = 10;
    case QUARTER = 25;

    public function toFloat(): float
    {
        return $this->value / 100;
    }
}