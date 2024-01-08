<?php

namespace App\Http\Controllers;
use App\Models\Dosen;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){

        $dosens = dosen::all();

        return view('dosen.index', compact('dosens'));
    }

    public function create(){

        return view('dosen.create');
    }

    public function store(Request $request){
        // dd($request->all());

         // Validasi data jika diperlukan 
         $request->validate([ 
            'nama' => 'required|string|max:255', 
            'nip' => 'required|string|max:255', 
            'jabatan' => 'required|string'
        ]); 

        // Untuk menyimpan data dari controller ke model
        Dosen::create([ 
            'nama' => $request->input('nama'), 
            'nip' => $request->input('nip'), 
            'jabatan' => $request->input('jabatan'), 
        
        ]);

         // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
         return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil disimpan.');
    }

    public function edit($id){

        $dosens = Dosen::find($id);
        return view('dosen.edit', compact('dosens'));
    }

    public function update(Request $request, $id){
        // Validasi data jika diperlukan 
        $request->validate([ 
            'nama' => 'required|string|max:255', 
            'nip' => 'required|string|max:255', 
            'jabatan' => 'required|string'
        ]); 

         // Temukan data mahasiswa yang akan diubah
        $dosens = Dosen::find($id);

        // Perbarui data mahasiswa
        $dosens->nama = $request->input('nama');
        $dosens->nip = $request->input('nip');
        $dosens->jabatan = $request->input('jabatan');
        $dosens->save();

        // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy($id){
        // Temukan data dosen yang akan dihapus
        $dosens = Dosen::find($id);

        if ($dosens) {
            // Hapus data dosen
            $dosens->delete();

            // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
        } else {
            return redirect()->route('dosen.index')->with('error', 'Data dosen tidak ditemukan.');
        }
    }
}