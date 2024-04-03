<?php

namespace App\Classes;

use App\Interfaces\InterfacePlayer;

class Player implements InterfacePlayer
{
    private string $name;
    private int $balance;
    private array $properties;

    public function __construct($name)
    {
        $this->name = $name;
        $this->balance = 5000000;
        $this->properties = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function addMoney(int $amount): void
    {
        $this->balance += $amount;
    }

    public function removeMoney(int $amount): void
    {
        $newBalance = $this->balance - $amount;

        if ($newBalance < 0) {
            throw new \RuntimeException('Solde insuffisant');
        }

        $this->balance = $newBalance;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function addProperty(CardProperty $property): void
    {
        $this->properties[] = $property;
    }
}
