<?php

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
    $guestCode = request('guest');
    $invitation = Invitation::where('guest_code', $guestCode)->first();

    QrCode::size(500)
          ->format('png')
          ->generate($invitation->guest_code, storage_path('app/public/qr/'.$guestCode.'.png'));
    $qr = storage_path('app/public/qr/'.$guestCode.'.png');

    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('qr', compact('invitation', 'qr'));

    return $pdf->download('Invitation, The Wedding of Kevin & Fernanda, 09-10-2022' . $guestCode.'.pdf');
});

Route::get('/qr', function () {
    $guestCode = request('guest');
    $invitation = Invitation::where('guest_code', $guestCode)->first();

    QrCode::size(500)
          ->format('png')
          ->generate($invitation->guest_code, storage_path('app/public/qr/'.$guestCode.'.png'));

    return response()->file(storage_path('app/public/qr/'.$guestCode.'.png'));
});
