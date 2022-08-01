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
        'guestName' => $guestName,
        'invitation' => $invitation,
    ];

    return view('home', $data);
})->name('home');

Route::get('/download', function () {
    $guestName = '12345678901234567890123456789012345678901234'; // 44 max
    $guestName = 'Soo Jong Kiau, Ko Nanang, Ko Ati, Ko Aliong, Ko Afo';
    $guestCode = '616467';
    $fontSize = 45 - (round(strlen($guestName) / 10) * 5);
    //dd($fontSize);

    $intervention = new ImageManager;
    $template = $intervention->make(public_path('images/template-2.jpg'));
    $template->insert(storage_path('app/public/qr/616467.png'), 'top-left', 350, 525);
    $template->text($guestName, 600, 1100, function ($font) use ($fontSize) {
        $font->file(public_path('fonts/MADETOMMY-Bold.ttf'));
        $font->size($fontSize);
        $font->align('center');
        $font->valign('middle');
    });
    $template->text($guestCode, 600, 1140, function ($font) {
        $font->file(public_path('fonts/MADETOMMY.ttf'));
        $font->size(20);
        $font->align('center');
        $font->valign('middle');
    });
    $template->text('Table: Arendelle', 600, 1180, function ($font) {
        $font->file(public_path('fonts/MADETOMMY.ttf'));
        $font->size(20);
        $font->align('center');
        $font->valign('middle');
    });
    $template->save(storage_path('app/public/616467.jpg'));
    dd($template);

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

Route::get('login', function () {
    return redirect()->route('filament.auth.login');
})->name('login');
