<?php

declare(strict_types=1);

namespace AutomataApp;

use Automata\CellsFactory;
use Automata\RulesFactory;
use Automata\Iterator;
use Automata\Iterate;

class CellularAutomata
{
    public function step(string $initialCells, int $rule, int $steps): string
    {
        $cellsFactory = new CellsFactory();
        $rulesFactory = new RulesFactory(); 
        $iterate = new Iterate();

        $iterator = new Iterator(
            $iterate,
            $cellsFactory->create($initialCells),
            $rulesFactory->create($rule)
        );

        return $iterator->iterate($steps)->toJson();
    }
}
