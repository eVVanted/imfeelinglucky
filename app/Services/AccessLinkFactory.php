<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AccessLink;
use App\Models\User;
use Illuminate\Support\Str;

class AccessLinkFactory
{

    public function create(User $user): AccessLink
    {
        $link = new AccessLink();
        $link->ulid = (string)Str::ulid();
        $link->expires_at = now()->addDays(AccessLink::EXPIRATION_DAYS);

        $user->access_links()->save($link);

        return $link;
    }

}
