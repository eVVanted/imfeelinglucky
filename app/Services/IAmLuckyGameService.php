<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AccessLink;
use App\Models\LuckyResult;

readonly class IAmLuckyGameService
{

    public function __construct(private WinCalculator $winCalculator)
    {
    }

    public function play(AccessLink $link): LuckyResult
    {
        $luckyResult = new LuckyResult();
        $luckyResult->roll = random_int(LuckyResult::MINIMUM_ROLL, LuckyResult::MAXIMUM_ROLL);
        $luckyResult->amount = $this->winCalculator->calculate($luckyResult->roll);

        $link->lucky_results()->save($luckyResult);

        return $luckyResult;
    }


}
