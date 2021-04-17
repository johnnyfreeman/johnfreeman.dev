<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuController;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\SudoController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\RunCommandController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\RedirectToCommandController;

Route::get('/', StartupController::class);

Route::prefix('sudo')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/', [SudoController::class, 'prompt'])->name('login');
        Route::post('/', [SudoController::class, 'once']);
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('{input}', RunCommandController::class);
    });
});

Route::get('exit', [SudoController::class, 'exit']);

Route::post('execute', RedirectToCommandController::class);

Route::post('contact', SendMessageController::class)
    ->middleware(ProtectAgainstSpam::class);

Route::get('{input}', RunCommandController::class);
