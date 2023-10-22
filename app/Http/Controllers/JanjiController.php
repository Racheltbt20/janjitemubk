<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Janji;
use App\Models\User;

class JanjiController extends Controller
{
    // HALAMAN HOME
    public function index() {
        // JIKA ROLE GURU
        if(auth()->user()->role == 'guru') {
            abort(403);
        }

        return view('home', [
            'gurus' => User::where('role', 'guru')->get()
        ]);
    }

    // MENYIMPAN JANJI
    public function store(Request $request) {

        // CUSTOM MESSAGE
        $message = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'after' => ':attribute harus hari besoknya' 
        ];

        // VALIDASI
        $validatedData = $request->validate([
            'kelas' => 'required',
            'tanggal' => 'required|after:today',
            'guru' => 'required',
            'keterangan' => 'required|min:3|max:50'
        ], $message);

        $validatedData['user_id'] = $request->user_id;
        $validatedData['nama'] = $request->nama;

        Janji::create($validatedData);

        toastr()->success('', 'Janji berhasil dibuat');
        return redirect()->route('janji.index');
    }

    // HALAMAN DAFTAR JANJI SISWA
    public function daftar() {
        // JIKA ROLE GURU
        if(auth()->user()->role == 'guru') {
            abort(403);
        }

        return view('daftarJanji', [
            'datas' => Janji::where('user_id', auth()->user()->id)->latest()->paginate(5)
        ]);
    }

    // HALAMAN DETAIL JANJI SISWA
    public function detail($id) {
        // JIKA ROLE GURU
        if(auth()->user()->role == 'guru') {
            abort(403);
        }
        return view('detailJanji', [
            'detail' => Janji::where('id', $id)->first()
        ]);
    }

    // HAPUS JANJI
    public function delete($id) {
        $janji = Janji::find($id);


        $janji->delete();

        toastr()->success('', 'Janji berhasil dihapus');
        return redirect()->route('janji.daftar');
    }
}
