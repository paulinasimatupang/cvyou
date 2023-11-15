<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DataSkill as DataSkill;
use Illuminate\Support\Facades\Session;

class DataSkillController extends Controller
{
    public function tambahdataskill(){
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();
    
        // Mengambil data skill hanya untuk pengguna yang saat ini login
        $data = DataSkill::where('pengguna_id', $penggunaId)->get();
    
        return view('dataskill', compact('data'));
    }

    public function insertskill(Request $request){
    DataSkill::create([
        'pengguna_id' => Auth::id(),
        'skill' => $request->skill,
        'rating' => $request->rating,
    ]);

        return redirect()->route('tambahdataskill')->with('success', 'Data berhasil ditambahkan');
    }


    public function editdataskill($id){
        $data = DataSkill::find($id);
        return view('editdataskill', compact('data'));
    }

    public function deleteskill($id){
        $data = DataSkill::find($id);
        $data->delete();
        return redirect()->route('tambahdataskill')->with('success', 'Data berhasil dihapus');
    }
}