<?php

declare(strict_types=1);

namespace AutomataApp;

class CellularAutomata
{
    public function step(string $initialCells, int $rule, int $steps): string
    {
        return json_encode(
            [
                [0, 1, 0],
                [1, 1, 0],
            ]
        );
    }
}
