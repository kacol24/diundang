<?php

use App\Http\Controllers\RsvpController;
use App\Models\Invitation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
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
    $guestName = request('for', 'Tamu Undangan');

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
    abort_unless($guestCode, 404, 'Guest code missing.');

    $invitation = Invitation::where('guest_code', $guestCode)->firstOrFail();

    $qrname = storage_path('app/public/qr/'.$guestCode.'.png');
    $filename = storage_path('app/public/['.$guestCode.'] Invitation, The Wedding of Kevin & Fernanda, 09-10-2022.pdf');

    if (! file_exists($filename)) {
        QrCode::size(500)
              ->format('png')
              ->generate($invitation->guest_code, $qrname);
        $qr = $qrname;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('qr', compact('invitation', 'qr'));
        $pdf->save($filename);
    }

    return response()->download($filename);
})->name('download');

Route::post('rsvp', [RsvpController::class, 'store'])
     ->name('rsvp.store');
