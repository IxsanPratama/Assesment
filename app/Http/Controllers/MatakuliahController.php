<?php

namespace App\Http\Controllers;
use App\Models\Matakuliah;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(){

        $matakuliahs = Matakuliah::all();

        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create(){

        return view('matakuliah.create');
    }

    public function store(Request $request){
        // dd($request->all());

         // Validasi data jika diperlukan 
         $request->validate([ 
            'kode' => 'required|string|max:255', 
            'matakuliah' => 'required|string|max:255', 
            'kelas' => 'required|string'
        ]); 

        // Untuk menyimpan data dari controller ke model
        Matakuliah::create([ 
            'kode' => $request->input('kode'), 
            'matakuliah' => $request->input('matakuliah'), 
            'kelas' => $request->input('kelas'), 
        
        ]);

         // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
         return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil disimpan.');
    }

    public function edit($id){

        $matakuliahs = matakuliah::find($id);
        return view('matakuliah.edit', compact('matakuliahs'));
    }

    public function update(Request $request, $id){
        // Validasi data jika diperlukan 
        $request->validate([ 
            'kode' => 'required|string|max:255', 
            'matakuliah' => 'required|string|max:255', 
            'kelas' => 'required|string'
        ]); 

         // Temukan data mahasiswa yang akan diubah
        $matakuliahs = Matakuliah::find($id);

        // Perbarui data mahasiswa
        $matakuliahs->kode = $request->input('kode');
        $matakuliahs->matakuliah = $request->input('matakuliah');
        $matakuliahs->kelas = $request->input('kelas');
        $matakuliahs->save();

        // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan 
        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil diperbarui.');
    }

    public function destroy($id){
        // Temukan data matakuliah yang akan dihapus
        $matakuliahs = Matakuliah::find($id);

        if ($matakuliahs) {
            // Hapus data dosen
            $matakuliahs->delete();

            // Redirect kembali ke halaman index atau halaman lainnya jika diperlukan
            return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil dihapus.');
        } else {
            return redirect()->route('matakuliah.index')->with('error', 'Data matakuliah tidak ditemukan.');
        }
    }
}