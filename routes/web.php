<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', Controllers\NoCommandController::class);

Route::prefix('sudo')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/', [Controllers\SudoController::class, 'prompt'])->name('login');
        Route::post('/', [Controllers\SudoController::class, 'once']);
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('su', [Controllers\SuController::class, 'attempt']);

        Route::get('{input}', Controllers\RunCommandController::class);
    });
});

Route::post('execute', Controllers\RedirectToCommandController::class)
    ->name('execute');

Route::post('contact', Controllers\SendMessageController::class)
    ->name('contact')
    ->middleware(ProtectAgainstSpam::class);

Route::prefix('blog')->group(function () {
    Route::get('/', [Controllers\BlogController::class, 'index'])
        ->name('blog');
    Route::get('create', [Controllers\BlogController::class, 'create'])
        ->name('blog.create');
    Route::post('saving', [Controllers\BlogController::class, 'store'])
        ->middleware('auth')
        ->name('blog.store');
});

Route::get('su', [Controllers\SuController::class, 'attempt'])
    ->middleware(['auth']);
Route::get('exit', [Controllers\SuController::class, 'exit']);

Route::get('{input}', Controllers\RunCommandController::class);
