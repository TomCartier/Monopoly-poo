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
    private $description;

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

    public function getDescription()
    {
        return $this->description;
    }

    // public function executeAction(Player $player, Board $board)
    public function executeAction(Player $player)
    {
        switch ($this->typeAction) {
            case 'pay':
                $player->removeMoney($this->description);
                break;
            case 'collect':
                $player->addMoney($this->description);
                break;
                // case 'move':
                //     $board->movePlayer($player, $this->description);
                //     break;
        }
    }
}
