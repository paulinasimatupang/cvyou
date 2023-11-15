<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UpBerkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BerkasPendukungController extends Controller
{
    public function tambahberkaspendukung()
    {
        // Logika untuk menampilkan formulir tambah berkas pendukung
        $data = UpBerkas::all();
        return view('databerkaspendukung', compact('data'));
    }

    public function insertberkaspendukung(Request $request)
    {
        $request->validate([
            'sertifikat' => 'required|mimes:pdf,doc,docx|max:2048',
            'suratrekomendasi' => 'required|mimes:pdf,doc,docx|max:2048',
            'portofolio' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $sertifikatFile = $request->file('sertifikat');
        $suratrekomendasiFile = $request->file('suratrekomendasi');
        $portofolioFile = $request->file('portofolio');
        $userId = Auth::id();
    
        $sertifikatFileName = time() . '_' . $sertifikatFile->getClientOriginalName();
        $suratrekomendasiFileName = time() . '_' . $suratrekomendasiFile->getClientOriginalName();
        $portofolioFileName = time() . '_' . $portofolioFile->getClientOriginalName();
    
        // Menyimpan berkas ke dalam direktori penyimpanan
        $sertifikatFile->move(public_path('uploads'), $sertifikatFileName);
        $suratrekomendasiFile->move(public_path('uploads'), $suratrekomendasiFileName);
        $portofolioFile->move(public_path('uploads'), $portofolioFileName);
    
        // Menyimpan informasi berkas ke dalam database
        UpBerkas::create([
            'pengguna_id' => $userId, // Sesuaikan dengan pengguna yang sedang login
            'sertifikat' => $request->sertifikatFileName,
            'suratrekomendasi' => $request->suratrekomendasiFileName,
            'portofolio' => $request->portofolioFileName,
            'file_path' => $request->sertifikatFileName, // Simpan nama salah satu berkas, atau sesuaikan dengan kebutuhan
        ]);
    
        return redirect()->route('tambahberkaspendukung')->with('success', 'Berkas berhasil diunggah');
    }

    public function deleteberkaspendukung($berkasId)
    {
    // Temukan berkas berdasarkan ID
    $berkas = UpBerkas::find($berkasId);
    // Hapus berkas dari penyimpanan
    if ($berkas) {
        $filePath = public_path('uploads') . '/' . $berkas->file_path;
        if (file_exists($filePath)) {
            unlink($filePath); // Hapus berkas dari direktori penyimpanan
        }

        // Hapus berkas dari database
        $berkas->delete();
        return redirect()->back()->with('success', 'Berkas berhasil dihapus');
    }
    return redirect()->back()->with('error', 'Berkas tidak ditemukan');
    }
}
