<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RedirectToCommandController;
use App\Http\Controllers\RunCommandController;
use App\Http\Controllers\SendMessageController;

Route::get('/', HomeController::class);
Route::get('{input}', RunCommandController::class);
Route::post('execute', RedirectToCommandController::class);
Route::post('contact', SendMessageController::class);
