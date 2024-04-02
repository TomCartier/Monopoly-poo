<?php

namespace App\Classes;

use App\Interfaces\InterfaceCard;
use App\Config\Config;

class CardProperty implements InterfaceCard
{
    private string $color;
    private string $name;
    private int $price;
    private int $rent;
    private int $houses;
    private int $hotels;
    private $owner;

    public function __construct($color, $name, $price, $rent)
    {
        $this->color = $color;
        $this->name = $name;
        $this->price = $price;
        $this->rent = $rent;
        $this->houses = 0;
        $this->hotels = 0;
        $this->owner = null;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getRent(): int
    {
        return $this->rent;
    }

    public function setRent($rent)
    {
        $this->rent = $rent;
    }

    // public function setOwner($owner)
    // {
    //     $this->owner = $owner;
    // }

    // public function getOwner()
    // {
    //     return $this->owner;
    // }

    public function addHouse()
    {
        if ($this->houses < 4) {
            $this->houses++;
        }
    }

    public function removeHouse()
    {
        if ($this->houses > 0) {
            $this->houses--;
        }
    }

    public function getHouses()
    {
        return $this->houses;
    }

    public function addHotel()
    {
        if ($this->houses == 4 && $this->hotels == 0) {
            $this->houses = 0;
            $this->hotels = 1;
        }
    }

    public function removeHotel()
    {
        if ($this->hotels == 1) {
            $this->hotels = 0;
        }
    }

    public function getHotels()
    {
        return $this->hotels;
    }
}
