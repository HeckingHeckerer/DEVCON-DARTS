<?php

use Illuminate\Support\Facades\Route;

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/public.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/resident.php';
require __DIR__ . '/barangay.php';
require __DIR__ . '/super_admin.php';
