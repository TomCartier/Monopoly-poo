<?php

namespace App\Services;

use App\Classes\CardProperty;

class BtpService
{
    public function addHouse(CardProperty $property)
    {
        if ($property->getHouses() < 4) {
            $property->setHouses($property->getHouses() + 1);
        } else {
            throw new \RuntimeException('Le nombre maximal de maisons est déjà atteint pour cette propriété.');
        }
    }

    public function removeHouse(CardProperty $property)
    {
        if ($property->getHouses() > 0) {
            $property->removeHouse();
        }
    }

    public function addHotel(CardProperty $property)
    {
        if ($property->getHouses() == 4 && $property->getHotels() == 0) {
            $property->addHotel();
        }
    }

    public function removeHotel(CardProperty $property)
    {
        if ($property->getHotels() == 1) {
            $property->removeHotel();
        }
    }
}
