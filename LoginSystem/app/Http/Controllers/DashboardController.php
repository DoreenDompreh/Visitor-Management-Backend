<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Show the dashboard to authenticated users
    public function index() {
        return view('dashboard'); // Refers to resources/views/dashboard.blade.php
    }
}
