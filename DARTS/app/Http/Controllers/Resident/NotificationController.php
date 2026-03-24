<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(Request $request): View
    {
        $notifications = new Collection([
            [
                'title' => 'Welcome to the Resident Portal',
                'message' => 'Your resident-facing shell pages are now active.',
                'type' => 'info',
                'created_at' => now()->subMinutes(30),
            ],
            [
                'title' => 'Verification workflow will be added in Part 3',
                'message' => 'Registration, pending verification, correction, and rejection screens are next.',
                'type' => 'warning',
                'created_at' => now()->subHours(3),
            ],
            [
                'title' => 'Request center shell is active',
                'message' => 'Request history and detail pages are ready for the next workflow slices.',
                'type' => 'success',
                'created_at' => now()->subDay(),
            ],
        ]);

        return view('resident.notifications.index', [
            'notifications' => $notifications,
        ]);
    }
}
