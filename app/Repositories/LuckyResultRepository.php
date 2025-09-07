<?php

namespace App\Repositories;

use App\Models\LuckyResult;
use Illuminate\Database\Eloquent\Collection;

class LuckyResultRepository
{

    public function getLuckyResultHistoryByLinkUlid(string $ulid): Collection
    {
        return LuckyResult::query()
            ->where('access_link_ulid', $ulid)
            ->orderByDesc('id')
            ->take(LuckyResult::HISTORY_LENGTH)
            ->get();
    }

}
