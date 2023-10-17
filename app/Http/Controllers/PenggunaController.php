<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    // public function index(Request $request) {

    //     $data = Pengguna::all();

    //     if($request->has('search')) {
    //         $data = Pengguna::where('pengalaman','LIKE','%' .$request->search.'%')->paginate(5);
    //     } else{
    //         $data = Pengguna::paginate(5);
    //     }
    //     return view('tabeluser',compact('data'));
    // }
    
    public function index() {
        $data = Pengguna::all();

        return view('tabeluser', compact('data'));
    }

    public function tambahdatapribadi(){
        return view('datapribadi');
    }

    // ngejalanin bagaimana memasukan data dalam database
    public function insertdata(Request $request){
        $data = Pengguna::create($request->all());
        
        // Mengambil ID pengguna yang baru saja dibuat
        $dataId = $data->id;

        if ($request->hasFile('gambar')) {
            $fileName = time().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('berkastambahan'), $fileName);
            $data->gambar = $fileName; // Pastikan Anda mengatur atribut gambar pada model
            $data->save();
        }
        
        return redirect()->route('tambahdatapendidikan', ['id' => $dataId])->with('success', 'Data Berhasil di Simpan');
    }
    
    public function editdatapribadi($id) {
        $data = Pengguna::find($id);
        return view('editdatapribadi', compact('data'));
    }

    public function updatedatapribadi(Request $request, $id) {
        $data = Pengguna::find($id);
        
        $data->update($request->all());

        return redirect()->route('tambahdatapendidikan', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    }

    public function tambahdatapendidikan($id) {
        $data = Pengguna::find($id);
        return view('datapendidikan', compact('data'));
    }

    public function insertdatapendidikan(Request $request, $id) {
        $data = Pengguna::find($id);
        
        $data->update($request->all());

        return redirect()->route('tambahdatapekerjaan', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    }
    
    public function tambahdatapekerjaan($id) {
        $data = Pengguna::find($id);
        return view('datapekerjaan', compact('data'));
    }
    
    public function insertdatapekerjaan(Request $request, $id) {
        $data = Pengguna::find($id);
        
        $data->update($request->all());
        
        return redirect()->route('tambahberkaspendukung', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    }

    public function tambahberkaspendukung($id) {
        $data = Pengguna::find($id);
        return view('databerkaspendukung', compact('data'));
    }

    public function insertberkaspendukung(Request $request, $id) {
        $data = Pengguna::find($id);
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
        $data = Pengguna::find($id);
        $data->delete();

        return redirect('index')->with('success', 'Data Berhasil di Delete');
    }
}