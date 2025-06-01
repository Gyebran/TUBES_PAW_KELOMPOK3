<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $karyas = Auth::check() ? Auth::user()->karyas : collect(); // antisipasi kalau belum login
        return view('dashboard', compact('karyas'));
    }
}
