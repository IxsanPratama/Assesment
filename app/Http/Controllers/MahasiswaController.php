<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){

        $mahasiswas = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create(){

        return view('mahasiswa.create');
    }

    public function store(Request $request){
        // dd($request->all());

         // Validasi data jika diperlukan 
         $request->validate([ 
            'nim' => 'required|string|max:255', 
            'nama' => 'required|string|max:255', 
            'prodi' => 'required|string'
        ]); 

        // Untuk menyimpan data dari controller ke model
        Mahasiswa::create([ 
            'nim' => $request->input('nim'), 
            'nama' => $request->input('nama'), 
            'prodi' => $request->input('prodi'), 
        
        ]);

         // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
         return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }

    public function edit($id){

        $mahasiswas = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswas'));
    }

    public function update(Request $request, $id){
        // Validasi data jika diperlukan 
        $request->validate([ 
            'nim' => 'required|string|max:255', 
            'nama' => 'required|string|max:255', 
            'prodi' => 'required|string'
        ]); 

         // Temukan data mahasiswa yang akan diubah
        $mahasiswas = Mahasiswa::find($id);

        // Perbarui data mahasiswa
        $mahasiswas->nim = $request->input('nim');
        $mahasiswas->nama = $request->input('nama');
        $mahasiswas->prodi = $request->input('prodi');
        $mahasiswas->save();

        // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id){
        // Temukan data mahasisw yang akan dihapus
        $mahasiswas = Mahasiswa::find($id);

        if ($mahasiswas) {
            // Hapus data mahasiswa
            $mahasiswas->delete();

            // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
        } else {
            return redirect()->route('mahasiswa.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
    }
}