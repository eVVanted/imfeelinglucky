<?php

declare(strict_types=1);

namespace App\Services;

class WinCalculator
{

    public function calculate(int $roll): int
    {
        if ($roll % 2 !== 0) {
            return 0;
        }

        $percent = match (true) {
            $roll > 900 => 0.7,
            $roll > 600 => 0.5,
            $roll > 300 => 0.3,
            default => 0.1,
        };

        return (int)round($roll * $percent * 100);
    }

}
