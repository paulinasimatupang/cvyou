<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DataSkill as DataSkill;
use Illuminate\Support\Facades\Session;

class DataSkillController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = DataSkill::where('skill','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else{
            $data = DataSkill::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('dataskill', compact('data'));
    }

    public function tambahdataskill(){
        $data = DataSkill::all();
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

    public function updateskill(Request $request, $id){
        $data = DataSkill::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success', 'Data berhasil diupdate');
        }
        return redirect()->route('tambahdataskill')->with('success', 'Data berhasil diupdate');
    }

    public function deleteskill($id){
        $data = DataSkill::find($id);
        $data->delete();
        return redirect()->route('tambahdataskill')->with('success', 'Data berhasil dihapus');
    }
}