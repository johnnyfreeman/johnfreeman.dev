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

Route::get('clear', Controllers\ClearController::class);

Route::post('contact', Controllers\SendMessageController::class)
    ->name('contact')
    ->middleware(ProtectAgainstSpam::class);

Route::prefix('blog')->group(function () {
    Route::get('/', [Controllers\BlogController::class, 'index'])
        ->name('blog');
    Route::get('link', [Controllers\BlogController::class, 'link'])
        ->middleware('auth')
        ->name('blog.link');
    Route::post('saving', [Controllers\BlogController::class, 'store'])
        ->middleware('auth')
        ->name('blog.store');

    Route::prefix('{post}')->middleware('auth')->group(function () {
        Route::get('/', [Controllers\BlogController::class, 'edit'])
            ->name('blog.edit');
        Route::post('update', [Controllers\BlogController::class, 'update'])
            ->name('blog.update');
        Route::delete('unlink', [Controllers\BlogController::class, 'unlink'])
            ->name('blog.unlink');
    });
});

Route::get('su', [Controllers\SuController::class, 'attempt'])
    ->middleware(['auth']);
Route::get('exit', [Controllers\SuController::class, 'exit']);

Route::get('{input}', Controllers\RunCommandController::class);
