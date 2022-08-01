<?php

use App\Http\Controllers\RsvpController;
use App\Models\Invitation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManager;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('/', function () {
    $guestName = request('for', 'Honored Guest');

    $guestCode = request('guest');
    $invitation = Invitation::firstWhere('guest_code', $guestCode);

    if ($invitation) {
        $guestName = $invitation->name;
    }

    $data = [
        'guestName'  => $guestName,
        'invitation' => $invitation,
    ];

    return view('home', $data);
})->name('home');

Route::get('/download', function () {
    $guestCode = request('guest');
    $invitation = Invitation::firstWhere('guest_code', $guestCode);

    return response()
        ->download(
            $invitation->qr_invitation_path,
            "[$guestCode] Invitation, The Wedding of Kevin & Fernanda, 24-09-2022.jpg"
        );
})->name('download');

Route::post('rsvp', [RsvpController::class, 'store'])
     ->name('rsvp.store');

Route::get('login', function () {
    return redirect()->route('filament.auth.login');
})->name('login');
