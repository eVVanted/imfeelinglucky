<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AccessLink;
use App\Models\User;
use Illuminate\Support\Facades\DB;

readonly class RegistrationService
{

    public function __construct(private AccessLinkFactory $accessLinkFactory)
    {
    }

    public function registerUser(string $name, string $phone): AccessLink
    {
        return DB::transaction(function () use ($name, $phone) {
            $user = new User();
            $user->name = $name;
            $user->phone = $phone;
            $user->save();

            return $this->accessLinkFactory->create($user);
        });
    }

}
