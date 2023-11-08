<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPendidikan as DataPendidikan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DataPendidikanController extends Controller
{
    public function tambahdatapendidikan() {
        $data = DataPendidikan::all();
        return view('datapendidikan', compact('data'));
    }

    public function insertdatapendidikan(Request $request) {
        $data = DataPendidikan::create([
            'pengguna_id' => 1,
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
