<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Classes\CardAction;
use App\Classes\Player;

final class CardActionTest extends TestCase
{

    public function testGetTypeCard(): void
    {
        $actionCard = new CardAction('Chance', 'Pay', 'Rendez-vous à la Rue de la Paix');
        $typeCard = $actionCard->getTypeCard();
        // le type de la carte générée est bien de type "string"
        $this->assertTrue(gettype($typeCard) == "string");
    }

    public function testGetTypeAction(): void
    {
        $actionCard = new CardAction('Chance', 'Pay', 'Rendez-vous à la Rue de la Paix');
        $typeAction = $actionCard->getTypeAction();
        // le type de la carte générée est bien de type "string"
        $this->assertTrue(gettype($typeAction) == "string");
    }

    public function testGetDescription(): void
    {
        $actionCard = new CardAction('Chance', 'Pay', 'Rendez-vous à la Rue de la Paix');
        $description = $actionCard->getDescription();
        // le type de la carte générée est bien de type "string"
        $this->assertTrue(gettype($description) == "string");
    }

    public function testExecuteAction(): void
    {
        $player = new Player('Tom');
        // $board = new Board();

        $initalBalancePlayer = $player->getBalance();

        $actionCard = new CardAction('Chance', 'Pay', 1000);

        // $actionCard->executeAction($player, $board);
        $actionCard->executeAction($player);

        // Vérifier que le solde du joueur a été correctement déduit de l'action
        $this->assertEquals($initalBalancePlayer - $actionCard->getDescription(), $player->getBalance());
    }
}
