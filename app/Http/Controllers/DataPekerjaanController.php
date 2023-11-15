<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DataPekerjaan as DataPekerjaan;
use Illuminate\Support\Facades\Session;

class DataPekerjaanController extends Controller
{
    public function tambahdatapekerjaan(){
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();
    
        // Mengambil data pekerjaan hanya untuk pengguna yang saat ini login
        $data = DataPekerjaan::where('pengguna_id', $penggunaId)->get();
    
        return view('datapekerjaan', compact('data'));
    }

    public function insertpekerjaan(Request $request){
        $this->validate($request,[
            'tanggal_akhir' => 'after_or_equal:tanggal_awal'
        ], ['tanggal_akhir.after_or_equal' => 'Tanggal Berakhir harus setelah atau sama dengan Tanggal Mulai.',
        ]);
        
        DataPekerjaan::create([
            'pengguna_id' => Auth::id(),
            'pengalaman' => $request->pengalaman,
            'deskripsi' => $request->deskripsi,
            'perusahaan' => $request->perusahaan,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);
        
        return redirect()->route('tambahdatapekerjaan')->with('success', 'Data berhasil ditambahkan');
    }


    public function editdatapekerjaan($id){
        $data = DataPekerjaan::find($id);
        return view('editdatapekerjaan', compact('data'));
    }

    public function deletepekerjaan($id){
        $data = DataPekerjaan::find($id);
        $data->delete();
        return redirect()->route('tambahdatapekerjaan')->with('success', 'Data berhasil dihapus');
    }
}