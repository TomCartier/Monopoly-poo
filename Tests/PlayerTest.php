<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Classes\Player;

final class PlayerTest extends TestCase
{

    public function testGetName(): void
    {
        $player = new Player('Tom');
        $playerName = $player->getName();
        // le nom du joueur générée est bien de type "string"
        $this->assertTrue(gettype($playerName) == "string");
    }
}
