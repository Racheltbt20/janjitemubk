<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Janji;
use App\Models\Guru;

class GuruController extends Controller
{
    // HALAMAN DAFTAR JANJI SESUAI GURU YANG DIPILIH SISWA
    public function index() {
        // JIKA ROLE SISWA
        if(auth()->user()->role == 'siswa') {
            abort(403);
        }

        return view('guru.daftarJanji', [
            'datas' => Janji::where('guru', auth()->user()->nama)->latest()->paginate(5)
        ]);
    }

    // HALAMAN DETAIL JANJI
    public function detail($id) {
        return view('guru.detailJanji', [
            'detail' => Janji::where('id', $id)->first()
        ]);
    }

    // MENGUBAH STATUS / MENGUPDATE KOLOM STATUS TABEL JANJI
    public function respon(Request $request, $id) {
        // CUSTOM MESSAGE
        $message = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter' 
        ];
        
        // VALIDASI
        $validatedData = $request->validate([
            'status' => 'required',
            'respon' => 'required|min:5'
        ], $message);

        Janji::where('id', $id)->update($validatedData);

        toastr()->success('', 'Respon berhasil dibuat');
        return redirect()->route('guru.index');
    }
}
