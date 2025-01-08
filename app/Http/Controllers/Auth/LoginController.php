<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Menentukan middleware untuk controller ini
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Ini adalah metode untuk login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Jika kredensial valid, coba login
        if (Auth::attempt($credentials)) {
            // Redirect ke halaman yang diinginkan
            return redirect()->intended('dashboard');
        }

        // Jika login gagal, kembali ke halaman login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
