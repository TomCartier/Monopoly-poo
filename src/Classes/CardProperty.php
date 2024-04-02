<?php

namespace App\Classes;

use App\Interfaces\InterfaceCard;
use App\Config\Config;
use App\Services\BtpService;

class CardProperty implements InterfaceCard
{
    private string $color;
    private string $name;
    private int $price;
    private int $rent;
    private int $houses;
    private int $hotels;
    private $owner;
    private BtpService $BtpService;

    public function __construct($color, $name, $price, $rent, BtpService $BtpService)
    {
        $this->color = $color;
        $this->name = $name;
        $this->price = $price;
        $this->rent = $rent;
        $this->houses = 0;
        $this->hotels = 0;
        $this->owner = null;
        $this->BtpService = $BtpService;
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
        $this->BtpService->addHouse($this);
    }

    public function removeHouse()
    {
        $this->BtpService->removeHouse($this);
    }

    public function setHouses(int $houses)
    {
        $this->houses = $houses;
    }

    public function getHouses()
    {
        return $this->houses;
    }

    public function addHotel()
    {
        $this->BtpService->addHotel($this);
    }

    public function removeHotel()
    {
        $this->BtpService->removeHotel($this);
    }

    public function setHotel(int $hotel)
    {
        $this->hotels = $hotel;
    }

    public function getHotels()
    {
        return $this->hotels;
    }
}
