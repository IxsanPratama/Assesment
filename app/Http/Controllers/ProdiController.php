<?php

namespace App\Http\Controllers;
use App\Models\Prodi;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){

        $prodis = Prodi::all();

        return view('prodi.index', compact('prodis'));
    }

    public function create(){

        return view('prodi.create');
    }

    public function store(Request $request){
        // dd($request->all());

         // Validasi data jika diperlukan 
         $request->validate([ 
            'nim' => 'required|string|max:255', 
            'angkatan' => 'required|string|max:255', 
            'jurusan' => 'required|string'
        ]); 

        // Untuk menyimpan data dari controller ke model
        Prodi::create([ 
            'nim' => $request->input('nim'), 
            'angkatan' => $request->input('angkatan'), 
            'jurusan' => $request->input('jurusan'), 
        
        ]);

         // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
         return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil disimpan.');
    }

    public function edit($id){

        $prodis = Prodi::find($id);
        return view('prodi.edit', compact('prodis'));
    }

    public function update(Request $request, $id){
        // Validasi data jika diperlukan 
        $request->validate([ 
            'nim' => 'required|string|max:255', 
            'angkatan' => 'required|string|max:255', 
            'jurusan' => 'required|string'
        ]); 

         // Temukan data mahasiswa yang akan diubah
        $prodis = Prodi::find($id);

        // Perbarui data mahasiswa
        $prodis->nim = $request->input('nim');
        $prodis->angkatan = $request->input('angkatan');
        $prodis->jurusan = $request->input('jurusan');
        $prodis->save();

        // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil diperbarui.');
    }

    public function destroy($id){
        // Temukan data mahasisw yang akan dihapus
        $prodis = Prodi::find($id);

        if ($prodis) {
            // Hapus data mahasiswa
            $prodis->delete();

            // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan
            return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil dihapus.');
        } else {
            return redirect()->route('prodi.index')->with('error', 'Data prodi tidak ditemukan.');
        }
    }
}