<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $guestName = request('for', 'Honored Guest');

        $guestCode = request('guest');
        $invitation = Invitation::firstWhere('guest_code', $guestCode);

        if ($invitation) {
            $guestName = $invitation->full_name;
        }

        $data = [
            'guestName'  => $guestName,
            'invitation' => $invitation,
        ];

        return view('home', $data);
    }

    public function login()
    {
        return redirect()->route('filament.auth.login');
    }
}
