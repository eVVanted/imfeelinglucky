<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegistrationService;
use Illuminate\Http\RedirectResponse;

class RegisterAction
{

    public function __invoke(RegisterRequest $request, RegistrationService $registrationService): RedirectResponse
    {
        $link = $registrationService->registerUser($request->input('name'), $request->input('phone'));

        return redirect()->route('home')->with('link', $link->ulid);
    }

}
