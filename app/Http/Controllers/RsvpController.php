<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        dd($request->guest);
    }
}
