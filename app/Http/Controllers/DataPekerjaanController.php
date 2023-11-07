<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPekerjaan as DataPekerjaan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DataPekerjaanController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = DataPekerjaan::where('pengalaman','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else{
            $data = DataPekerjaan::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datapekerjaan', compact('data'));
    }

    public function tambahdatapekerjaan(){
        $data = DataPekerjaan::all();
        return view('datapekerjaan', compact('data'));
    }

    public function insertpekerjaan(Request $request){
        $this->validate($request,[
            'tanggal_akhir' => 'after_or_equal:tanggal_awal'
        ], ['tanggal_akhir.after_or_equal' => 'Tanggal Berakhir harus setelah atau sama dengan Tanggal Mulai.',
        ]);
        
        // Pastikan 'tanggal_akhir' ada sebelum menyimpannya
        if ($request->has('tanggal_akhir')) {
            DataPekerjaan::create($request->all());
            return redirect()->route('tambahdatapekerjaan')->with('success', 'Data berhasil ditambahkan');
        }
        else {
            // Handle jika 'tanggal_akhir' tidak ada
            return redirect()->back()->with('error', 'Kolom Tanggal Berakhir harus diisi.');
        }
    }


    public function editdatapekerjaan($id){
        $data = DataPekerjaan::find($id);
        return view('editdatapekerjaan', compact('data'));
    }

    public function updatepekerjaan(Request $request, $id){
        $data = DataPekerjaan::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success', 'Data berhasil diupdate');
        }
        return redirect()->route('tambahdatapekerjaan')->with('success', 'Data berhasil diupdate');
    }

    public function deletepekerjaan($id){
        $data = DataPekerjaan::find($id);
        $data->delete();
        return redirect()->route('tambahdatapekerjaan')->with('success', 'Data berhasil dihapus');
    }
}