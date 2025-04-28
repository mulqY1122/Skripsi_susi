<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Show the application dashboard based on the user's role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

// Periksa peran pengguna dan arahkan ke halaman yang sesuai
if ($user->role_name === 'Super Admin') {
    return view('Super_admin.home'); // Halaman untuk Super Admin
} elseif ($user->role_name === 'Admin') {
    return view('Admin.home'); // Halaman untuk Admin
} elseif ($user->role_name === 'User') {
    return view('user.Home_user'); // Halaman untuk User
}


        // Jika peran tidak sesuai, arahkan ke halaman default atau kesalahan
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
