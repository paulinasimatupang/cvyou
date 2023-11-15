<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\DataPribadi;
use Illuminate\Http\Request;

class DataPribadiController extends Controller
{   
    public function index() {
        $data = DataPribadi::all();

        return view('tabeluser', compact('data'));
    }

    public function tambahdatapribadi(){
        return view('datapribadi');
    }

    // ngejalanin bagaimana memasukan data dalam database
    public function insertdata(Request $request){
        $data = DataPribadi::create([
            'pengguna_id' => Auth::id(),
            'poto' => $request->poto,
            'firstnm' => $request->firstnm,
            'lastnm' => $request->lastnm,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'email' => $request->email,
            'notelpon' => $request->notelpon,
            'alamat' => $request->alamat,
        ]);;
        
        // Mengambil ID pengguna yang baru saja dibuat
        $dataId = $data->id;

        if ($request->hasFile('gambar')) {
            $fileName = time().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('berkastambahan'), $fileName);
            $data->gambar = $fileName; // Pastikan Anda mengatur atribut gambar pada model
            $data->save();
        }
        
        // return redirect($data)->route('tambahdatapendidikan', ['id' => $dataId])->with('success', 'Data Berhasil di Simpan');
        return redirect()->route('tambahdatapribadi', ['id' => $dataId])->with('success', 'Data Berhasil di Simpan');
    }
    
    public function editdatapribadi($id) {
        $data = DataPribadi::find($id);
        return view('editdatapribadi', compact('data'));
    }

    public function updatedatapribadi(Request $request, $id) {
        $data = DataPribadi::find($id);
        
        $data->update($request->all());

        return redirect()->route('tambahdatapendidikan', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    }

    public function tambahdatapendidikan($id) {
        $data = DataPribadi::find($id);
        return view('datapendidikan', compact('data'));
    }

    public function insertdatapendidikan(Request $request, $id) {
        $data = DataPribadi::find($id);
        
        $data->update($request->all());

        return redirect()->route('tambahdatapekerjaan', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    }
    
    // public function tambahdatapekerjaan($id) {
    //     $data = DataPribadi::find($id);
    //     return view('datapekerjaan', compact('data'));
    // }
    
    // public function insertdatapekerjaan(Request $request, $id) {
    //     $data = DataPribadi::find($id);
        
    //     $data->update($request->all());
        
    //     return redirect()->route('tambahberkaspendukung', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    // }

    public function tambahberkaspendukung($id) {
        $data = DataPribadi::find($id);
        return view('databerkaspendukung', compact('data'));
    }

    public function insertberkaspendukung(Request $request, $id) {
        $data = DataPribadi::find($id);
        $data->update($request->all());

        if ($request->hasFile('pdf')) {
            $fileName = time().'.'.$request->file('pdf')->extension();
            $request->file('pdf')->move(public_path('berkastambahan'), $fileName);
            $data->pdf = $fileName; // Pastikan Anda mengatur atribut gambar pada model
            $data->save();
        }
        
        return redirect()->route('tambahberkaspendukung', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    }

    public function delete($id) {
        $data = DataPribadi::find($id);
        $data->delete();

        return redirect('index')->with('success', 'Data Berhasil di Delete');
    }

    // public function output() {
    //     $data = ::all();

    //     return view(('output'), compact('data'));
    // }
}