<?php

declare(strict_types=1);

namespace Tests;

use App\Classes\CardProperty;
use PHPUnit\Framework\TestCase;

use App\Classes\Player;
use App\Services\BtpService;

final class PlayerTest extends TestCase
{

    public function testGetName(): void
    {
        $player = new Player('Tom');
        $playerName = $player->getName();
        // le nom du joueur générée est bien de type "string"
        $this->assertTrue(gettype($playerName) == "string");
    }

    public function testGetBalance(): void
    {
        $player = new Player('Tom');
        $balance = $player->getBalance();
        // le solde du joueur est bien de type "integer"
        $this->assertTrue(gettype($balance) == "integer");
    }

    public function testAddMoney(): void
    {
        $player = new Player('Tom');
        $initalBalance = $player->getBalance();

        $player->addMoney(1000);

        $this->assertEquals($initalBalance + 1000, $player->getBalance());
    }

    public function testRemoveMoney(): void
    {
        $player = new Player('Tom');
        $initalBalance = $player->getBalance();

        $player->removeMoney(1000);

        $this->assertEquals($initalBalance - 1000, $player->getBalance());
    }

    public function testGetProperties(): void
    {
        $player = new Player('Tom');
        $properties = $player->getProperties();
        // les properties du joueur est bien de type "array"
        $this->assertTrue(gettype($properties) == "array");
    }

    public function testAddProperties(): void
    {
        $player = new Player('Tom');
        $initialProperties = $player->getProperties();

        $BtpService = new BtpService();
        $property = new CardProperty('Dark blue', 'Rue de la Paix', 400000000, 1000, $BtpService);

        // Ajout de la propriété sur le joueur
        $player->addProperty($property);

        // Vérifier que la propriété à bien été ajoutée
        $updatedProperties = $player->getProperties();
        $this->assertContains($property, $updatedProperties);

        // Vérifier que la liste des propriétés contient une propriété de plus
        $this->assertCount(count($initialProperties) + 1, $updatedProperties);
    }
}
