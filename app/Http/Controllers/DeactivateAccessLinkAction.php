<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AccessLink;
use Illuminate\Http\RedirectResponse;

class DeactivateAccessLinkAction
{

    public function __invoke(AccessLink $link): RedirectResponse
    {
        $link->deactivate();

        return redirect()->route('home');
    }

}
