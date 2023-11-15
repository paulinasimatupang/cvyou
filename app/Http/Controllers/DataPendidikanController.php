<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DataPendidikan as DataPendidikan;

class DataPendidikanController extends Controller
{
    public function tambahdatapendidikan() {
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();

        // Mengambil data pendidikan hanya untuk pengguna yang saat ini login
        $data = DataPendidikan::where('pengguna_id', $penggunaId)->get();

        return view('datapendidikan', compact('data'));
    }

    public function insertdatapendidikan(Request $request) {
        DataPendidikan::create([
            'pengguna_id' => Auth::id(),
            'pendidikanformal' => $request->pendidikanformal,
            'gelar' => $request->gelar,
            'institusipendidikan' => $request->institusipendidikan,
            'prestasiakademik' => $request->prestasiakademik,
            'keterampilan' => $request->keterampilan,
        ]);;
        return redirect()->route('tambahdatapendidikan')->with('success', 'Data Berhasil di Simpan');
    }

    public function editdatapendidikan($id){
        $data = DataPendidikan::find($id);
        return view('editdatapendidikan', compact('data'));
    }

    public function updatependidikan(Request $request, $id){
        $data = DataPendidikan::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success', 'Data berhasil diupdate');
        }
        return redirect()->route('tambahdatapendidikan')->with('success', 'Data berhasil diupdate');
    }
    public function deletependidikan($id){
        $data = DataPendidikan::find($id);
        $data->delete();
        return redirect()->route('tambahdatapendidikan')->with('success', 'Data berhasil dihapus');
    }
}
