<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Classes\CardProperty;

final class CardPropertyTest extends TestCase
{

    public function testGetColor(): void
    {
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000);
        $color = $property->getColor();
        // la couleur de la propriété générée est bien de type "string"
        $this->assertTrue(gettype($color) == "string");
    }

    public function testGetName(): void
    {
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000);
        $name = $property->getName();
        // le nom de la propriété générée est bien de type "string"
        $this->assertTrue(gettype($name) == "string");
    }

    public function testGetPrice(): void
    {
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000);
        $price = $property->getPrice();
        // le prix de la propriété générée est bien de type "integer" et >= 1
        $this->assertTrue(gettype($price) == "integer");
        $this->assertTrue($price >= 1);
    }

    public function testGetRent(): void
    {
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000);
        $rent = $property->getRent();
        // le prix du loyer de la propriété générée est bien de type "integer" et >= 1
        $this->assertTrue(gettype($rent) == "integer");
        $this->assertTrue($rent >= 1);
    }

    public function testSetRent(): void
    {
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000);

        // Définir le nouveau loyer
        $property->setRent(5000);
        // Vérifier si le loyer a été correctement défini
        $this->assertEquals(5000, $property->getRent());
        // le prix du loyer de la propriété générée est bien de type "integer" et >= 1
        $this->assertTrue(gettype($property->getRent()) == "integer");
        $this->assertTrue($property->getRent() >= 1);
    }

    public function testAddHouse(): void
    {
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000);

        // Ajout d'une maison
        $property->addHouse();

        // Vérifier si une maison a été ajoutée
        // Vérifier qu'on ne puisse pas ajouter plus de 4 maisons au total
    }
}
