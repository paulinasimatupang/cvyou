<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(){

        $data = Pengguna::all();
        return view('tabeluser',compact('data'));
    }

    public function tambahdatapribadi(){
        return view('datapribadi');
    }

    public function tambahdatapendidikan(){
        return view ('datapendidikan');
    }


    // ngejalanin bagaimana memasukan data dalam database
    public function insertdata(Request $request){
        Pengguna::create($request->all());
        return redirect()->route('tambahdatapribadi')->with('success', 'Data Berhasil di Simpan');
    }

    

}
