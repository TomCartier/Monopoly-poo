<?php

namespace App\Classes;

use App\Interfaces\InterfaceCard;
use App\Config\Config;

class Card implements InterfaceCard
{

    // public $cash;

    public function __construct()
    {
        // $this->cash = Config::$cash;
    }

    // public function cashout(int $amount): bool
    // {
    //     if ($amount > $this->cash || $amount <= 0) {
    //         return false;
    //     }

    //     $this->cash -= $amount;
    //     return true;
    // }
}
