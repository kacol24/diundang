<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RsvpController;
use App\Models\Invitation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)
     ->name('home');

Route::get('/download', DownloadController::class)
     ->name('download');

Route::get('print', [PrintController::class, 'qr'])
     ->name('print');

Route::get('label', [PrintController::class, 'label'])
     ->name('label');

Route::post('rsvp', [RsvpController::class, 'store'])
     ->name('rsvp.store');

Route::get('login', [HomeController::class, 'login'])
     ->name('login');

Route::domain(config('filament.domain'))
     ->middleware(config('filament.middleware.base'))
     ->name('filament.')
     ->prefix(config('filament.path'))
     ->group(function () {
         Route::post('import');
     });
