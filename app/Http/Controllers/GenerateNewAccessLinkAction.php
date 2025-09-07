<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AccessLink;
use App\Services\AccessLinkFactory;
use Illuminate\Http\RedirectResponse;

class GenerateNewAccessLinkAction
{

    public function __invoke(AccessLink $link, AccessLinkFactory $accessLinkFactory): RedirectResponse
    {
        $newLink = $accessLinkFactory->create($link->user);

        return redirect()->route('a', $newLink->ulid);
    }

}
