<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AccessLink;
use App\Services\IAmLuckyGameService;

class PlayIAmLuckyGameAction
{

    public function __invoke(AccessLink $link, IAmLuckyGameService $iAmLuckyGameService)
    {
        $luckyResult = $iAmLuckyGameService->play($link);

        return redirect()
            ->route('a', $link->ulid)
            ->with('lucky', [
                'roll'   => $luckyResult->roll,
                'isWin'  => $luckyResult->isWin(),
                'amount' => $luckyResult->getAmountAsMoney(),
            ]);
    }

}
