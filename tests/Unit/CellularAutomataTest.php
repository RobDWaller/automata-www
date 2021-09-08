<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use AutomataApp\CellularAutomata;

class CellularAutomataTest extends TestCase
{
    public function testStep(): void
    {
        $cellularAutomata = new CellularAutomata();

        $result = $cellularAutomata->step('010', 110, 1);

        $this->assertJsonStringEqualsJsonString(
            json_encode(
                [
                    [0, 1, 0],
                    [1, 1, 0],
                ]
            ),
            $result
        );
    }

    public function testStepTwo(): void
    {
        $cellularAutomata = new CellularAutomata();

        $result = $cellularAutomata->step('0101', 110, 2);

        $this->assertJsonStringEqualsJsonString(
            json_encode(
                [
                    [0, 1, 0, 1],
                    [1, 1, 1, 1],
                    [0, 0, 0, 0],
                ]
            ),
            $result
        );
    }
}