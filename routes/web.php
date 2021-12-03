<?php

use App\Models\Invitation;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
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

    $img = Image::make(public_path('images/design.jpg'));
    QrCode::size(500)
          ->format('png')
          ->generate($invitation->guest_code, storage_path('app/public/qr/'.$guestCode.'.png'));
    $img->insert(storage_path('app/public/qr/'.$guestCode.'.png'));
    $img->save(storage_path('app/public/'.$guestCode.'.jpg'));

    return view('invitation', compact('invitation'));
});

Route::get('/qr', function () {
    $guestCode = request('guest');
    $invitation = Invitation::where('guest_code', $guestCode)->first();

    QrCode::size(500)
          ->format('png')
          ->generate($invitation->guest_code, storage_path('app/public/qr/'.$guestCode.'.png'));

    return response()->file(storage_path('app/public/qr/'.$guestCode.'.png'));
});
