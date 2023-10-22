<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    // HALAMAN REGISTRASI
    public function index() {
        return view('registrasi');
    }

    // INPUT USER BARU KE DB
    public function store(Request $request) {
        // CUSTOM ERROR MESSAGE
        $message = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'unique' => ':attribute sudah terdaftar',
            'regex' => ':attribute hanya bisa diisi huruf'
        ];

        // VALIDASI
        $validatedData = $request->validate([
            'nama' => 'required|min:4|max:50|unique:users|regex:/^[a-zA-Z ]+$/',
            'password' => 'required|min:4',
            'role' => 'required'
        ], $message);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $pwguru = 'guru123';

        // CEK ROLE
        if($request['role'] == 'guru') {
            $request->validate([
                'pwguru' => 'required'
            ], $message);
            
            if($request['pwguru'] == $pwguru) {
                User::create($validatedData);

                toastr()->success('Silahkan Login terlebih dahulu!', 'Berhasil Registrasi');
                return redirect()->route('login.index');
            } else {
                toastr()->error('', 'Registrasi Gagal');
                return redirect()->route('registrasi.index');
            }
        } else {
            User::create($validatedData);
    
            toastr()->success('Silahkan Login terlebih dahulu!', 'Berhasil Registrasi');
            return redirect()->route('login.index');
        }

    }
}
