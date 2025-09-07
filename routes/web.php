<?php

use App\Http\Controllers\DeactivateAccessLinkAction;
use App\Http\Controllers\GenerateNewAccessLinkAction;
use App\Http\Controllers\GetIAmLuckyGameHistoryByAccessLinkAction;
use App\Http\Controllers\PlayIAmLuckyGameAction;
use App\Http\Controllers\RegisterAction;
use App\Http\Middleware\EnsureAccessLinkIsValid;
use App\Models\AccessLink;
use Illuminate\Support\Facades\Route;

Route::get('/', static fn() => view('home'))->name('home');
Route::post('register', RegisterAction::class)->name('register');

Route::middleware([EnsureAccessLinkIsValid::class])->group(function () {
    Route::prefix('/a/{link}')
        ->name('a')
        ->group(function () {
            Route::get('', static fn(AccessLink $link) => view('page-a', ['link' => $link]));
            Route::get('/i-am-lucky-games-history', GetIAmLuckyGameHistoryByAccessLinkAction::class)
                ->name('.i-am-lucky-games-history');
            Route::post('/play-i-am-lucky-game', PlayIAmLuckyGameAction::class)
                ->name('.play-i-am-lucky-game');
        });

    Route::prefix('links/{link}')
        ->name('link')
        ->group(function () {
            Route::post('/generate-new', GenerateNewAccessLinkAction::class)
                ->name('.generate-new');
            Route::post('/deactivate', DeactivateAccessLinkAction::class)
                ->name('.deactivate');
        });
});
