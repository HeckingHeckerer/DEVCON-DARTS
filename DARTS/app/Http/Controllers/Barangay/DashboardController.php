<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('barangay.dashboard');
    }
}
