<?php

namespace App\Classes;

use App\Interfaces\InterfaceCard;
use App\Config\Config;
use App\Services\BtpService;
use InvalidArgumentException;

class CardAction implements InterfaceCard
{
    private string $typeCard;
    private string $typeAction;
    private string $description;

    public function __construct($typeCard, $typeAction, $description)
    {
        if (!in_array($typeCard, ['Chance', 'Caisse de communauté'])) {
            throw new InvalidArgumentException('Type de carte invalide');
        }

        if (!in_array($typeAction, ['Pay', 'Collect', 'Move'])) {
            throw new InvalidArgumentException('Type d\'action invalide');
        }

        $this->typeCard = $typeCard;
        $this->typeAction = $typeAction;
        $this->description = $description;
    }

    public function getTypeCard(): string
    {
        return $this->typeCard;
    }

    public function getTypeAction(): string
    {
        return $this->typeAction;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    // public function executeAction(Player $player, Board $board)
    // {
    //     switch ($this->type) {
    //         case 'pay':
    //             $player->deductMoney(100); // Le joueur doit payer 100
    //             break;
    //         case 'collect':
    //             $player->addMoney(50); // Le joueur gagne 100
    //             break;
    //         case 'move':
    //             $board->movePlayer($player, 5); // Le joueur se déplace sur une certaine case
    //             break;
    //     }
    // }
}
