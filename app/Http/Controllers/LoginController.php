<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // HALAMAN LOGIN
    public function index() {
        return view('login');
    }

    // AUTENTIKASI
    public function authenticate(Request $request) {

        // CUSTOM MESSAGE
        $message = [
            'required' => ':attribute salah'
        ];
        
        // VALIDASI
        $credentials = $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ], $message);

        // CEK ROLE
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toastr()->success('', 'Berhasil Login');
            if(auth()->user()->role == 'siswa') {
                return redirect()->intended('/');
            } else {
                return redirect()->intended('/guru/daftar');
            }
        }

        toastr()->error('', 'Login gagal!');
        return back();
    }

    // LOGOUT
    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->route('login.index');
    }
}
