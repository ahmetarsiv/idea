<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        $role = Auth::user()->role_id;
        switch($role) {
            case 1: return redirect()->route('admin.dashboard');

            case 2: return redirect()->route('admin.dashboard');
        }
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect('login');
    }
}
