<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard');
    }
}
