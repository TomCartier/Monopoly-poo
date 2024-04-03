<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Classes\CardProperty;
use App\Classes\Player;
use App\Services\BtpService;

final class CardPropertyTest extends TestCase
{

    public function testGetColor(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);
        $color = $property->getColor();
        // la couleur de la propriété générée est bien de type "string"
        $this->assertTrue(gettype($color) == "string");
    }

    public function testGetName(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);
        $name = $property->getName();
        // le nom de la propriété générée est bien de type "string"
        $this->assertTrue(gettype($name) == "string");
    }

    public function testGetPrice(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);
        $price = $property->getPrice();
        // le prix de la propriété générée est bien de type "integer" et >= 1
        $this->assertTrue(gettype($price) == "integer");
        $this->assertTrue($price >= 1);
    }

    public function testGetRent(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);
        $rent = $property->getRent();
        // le prix du loyer de la propriété générée est bien de type "integer" et >= 1
        $this->assertTrue(gettype($rent) == "integer");
        $this->assertTrue($rent >= 1);
    }

    public function testSetRent(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

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
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

        // Verif que le nombre de maison de base vaut 0
        $initialHouses = $property->getHouses();
        $this->assertEquals(0, $initialHouses);

        // Ajout d'une maison
        $property->addHouse();

        // Vérification qu'une maison a bien été ajoutée
        $houses = $property->getHouses();
        $this->assertEquals($initialHouses + 1, $houses);
    }

    public function testremoveHouse(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

        $property->addHouse();

        // Verif que le nombre de maison de base > 0
        $initialHouses = $property->getHouses();
        $this->assertTrue(0 < $initialHouses);

        // Supression d'une maison
        $property->removeHouse();

        // Vérification qu'une maison a bien été retirée
        $houses = $property->getHouses();
        $this->assertEquals($initialHouses - 1, $houses);
    }

    public function testAddHotel(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

        // Verif que le nombre de maison de base vaut 4
        $property->setHouses(4);
        $initialHouses = $property->getHouses();
        $this->assertEquals(4, $initialHouses);

        // Vérification qu'un hotêl à bien été ajoutée
        $property->addHotel();
        $nbHotels = $property->getHotels();
        $this->assertEquals(1, $nbHotels);

        // Vérification que les 4 maisons ont bien été retirées
        $nbHouses = $property->getHouses();
        $this->assertEquals(0, $nbHouses);
    }

    public function testRemoveHotel(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

        // Verif que le nombre d'hôtel vaut 1
        $property->setHotel(1);
        $initialHotels = $property->getHotels();
        $this->assertEquals(1, $initialHotels);

        // Vérification qu'un hotêl à bien été retiré
        $property->removeHotel();
        $nbHotels = $property->getHotels();
        $this->assertEquals(0, $nbHotels);

        // Vérification que les 4 maisons ont bien été remises
        $nbHouses = $property->getHouses();
        $this->assertEquals(4, $nbHouses);
    }

    public function testSetOwner(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

        $player = new Player('Tom');

        // Ajout du joueur sur la propriété
        $property->setOwner($player);

        // Vérifier que le joueur à bien été ajouté sur la propriété
        $updatedOwner = $property->getOwner();
        $this->assertSame($player, $updatedOwner);
    }

    public function testRemoveOwner(): void
    {
        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

        $player = new Player('Tom');

        // Ajout du joueur sur la propriété
        $property->setOwner($player);

        // Retrait du joueur sur la propriété
        $property->removeOwner($player);

        // Vérifier que le joueur à bien été ajouté sur la propriété
        $updatedOwner = $property->getOwner();
        $this->assertSame(null, $updatedOwner);
    }
}
