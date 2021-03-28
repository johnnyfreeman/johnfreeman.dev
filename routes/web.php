<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\RunCommandController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\RedirectToCommandController;

Route::get('/', StartupController::class);
Route::get('{input}', RunCommandController::class);
Route::post('execute', RedirectToCommandController::class);
Route::post('contact', SendMessageController::class)
    ->middleware(ProtectAgainstSpam::class);
