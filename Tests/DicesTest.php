<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Classes\Dices;

final class DicesTest extends TestCase
{

    public function testRoll(): void
    {
        $dices = new Dices();
        // le nombre généré est bien de type "int"
        $total = $dices->roll();
        $this->assertTrue(gettype($total) == "integer");
        // le nombre généré doit être entre 1 et le nombre de face du dé et il est retourné
        $this->assertTrue($total >= 1 && $total <= $dices->getNbFaces());
        // le nombre généré est bien stocké dans $this->value
        $this->assertTrue($total == $dices->getTotal());
        // le nombre généré est bien aléatoire
        $base_value = $dices->roll();
        $nb_rounds = 10;
        $result = False;
        while (!$result && $nb_rounds >= 0) {
            $roll_value = $dices->roll();
            $nb_rounds--;
            if ($roll_value != $base_value) {
                $result = True;
            }
        }
        $this->assertTrue($result);
    }

    public function testTotal(): void
    {
        $dices = new Dices();
        // le nombre généré est bien de type "int"
        $total = $dices->roll();
        $this->assertTrue(gettype($total) == "integer");
        // le nombre généré doit être entre 1 et le nombre de face du dé X2 et il est retourné
        $this->assertTrue($total >= 1 && $total <= $dices->getNbFaces());
    }

    public function testNumberOfFaces(): void
    {
        $dices = new Dices();
        $this->assertSame($dices->dice1->getNbFace() + $dices->dice2->getNbFace(), 12);
    }

    public function testIsDouble(): void
    {
        $dices = new Dices();

        $dices->dice1->setValue(3);
        $dices->dice2->setValue(3);

        $this->assertTrue($dices->is_double());
    }
}
