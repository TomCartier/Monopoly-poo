<?php

namespace App\Classes;

use App\Interfaces\InterfacePlayer;

class Player implements InterfacePlayer
{
    private string $name;
    private int $balance;

    public function __construct($name)
    {
        $this->name = $name;
        $this->balance = 5000000;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
