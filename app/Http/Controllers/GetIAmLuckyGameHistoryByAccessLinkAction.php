<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AccessLink;
use App\Repositories\LuckyResultRepository;
use Illuminate\Contracts\View\View;

class GetIAmLuckyGameHistoryByAccessLinkAction
{

    public function __invoke(AccessLink $link, LuckyResultRepository $luckyResultRepository): View
    {
        $history = $luckyResultRepository->getLuckyResultHistoryByLinkUlid($link->ulid);

        return view('page-a', [
            'link'    => $link,
            'history' => $history,
        ]);
    }

}
