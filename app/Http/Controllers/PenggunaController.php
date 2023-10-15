<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    public function index(Request $request){

        $data = Pengguna::all();
        return view('tabeluser',compact('data'));

        if($request->has('search')){
            $data = Pengguna::where('pengalaman','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else{
            $data = Pengguna::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('tabel1', compact('data'));
    }

    public function tambahdatapribadi(){
        return view('datapribadi');
    }

    public function tambahberkaspendukung(){
        return view('berkaspendukung');
    }

    // ngejalanin bagaimana memasukan data dalam database
    public function insertdata(Request $request){
        Pengguna::create($request->all());
        return redirect()->route('tambahdatapribadi')->with('succes', 'Data Berhasil di Simpan');
    }

    //mutia
    public function tambahdatapekerjaan(){
        $data = Pengguna::all();
        return view('tambahdatapekerjaan', compact('data'));
    }

    public function insertpekerjaan(Request $request){
        $this->validate($request,[
            'tanggal_akhir' => 'after_or_equal:tanggal_awal'
        ], ['tanggal_akhir.after_or_equal' => 'Tanggal Berakhir harus setelah atau sama dengan Tanggal Mulai.',
        ]);
        Pengguna::create($request->all());
        return redirect()->route('tabel1')->with('success', 'Data berhasil ditambahkan');
    }

    public function editdatapekerjaan($id){
        $data = Pengguna::find($id);
        return view('editdatapekerjaan', compact('data'));
    }

    public function updatepekerjaan(Request $request, $id){
        $data = Pengguna::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success', 'Data berhasil diupdate');
        }
        return redirect()->route('tabel1')->with('success', 'Data berhasil diupdate');
    }

    public function deletepekerjaan($id){
        $data = Pengguna::find($id);
        $data->delete();
        return redirect()->route('tabel1')->with('success', 'Data berhasil dihapus');
    }
}
