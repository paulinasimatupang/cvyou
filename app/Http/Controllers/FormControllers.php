<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form as Form;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class FormControllers extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Form::where('pengalaman','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else{
            $data = Form::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datapekerjaan', compact('data'));
    }

    public function tambahpekerjaan(){
        $data = Form::all();
        return view('tambahdata', compact('data'));
    }

    public function insertdata(Request $request){
        $this->validate($request,[
            'tanggal_akhir' => 'after_or_equal:tanggal_awal'
        ], ['tanggal_akhir.after_or_equal' => 'Tanggal Berakhir harus setelah atau sama dengan Tanggal Mulai.',
        ]);
        Form::create($request->all());
        return redirect()->route('datapekerjaan')->with('success', 'Data berhasil ditambahkan');
    }

    public function tampilkandata($id){
        $data = Form::find($id);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Form::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success', 'Data berhasil diupdate');
        }
        return redirect()->route('datapekerjaan')->with('success', 'Data berhasil diupdate');
    }

    public function deletedata($id){
        $data = Form::find($id);
        $data->delete();
        return redirect()->route('datapekerjaan')->with('success', 'Data berhasil dihapus');
    }
}