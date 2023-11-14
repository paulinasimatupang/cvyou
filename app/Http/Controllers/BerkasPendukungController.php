<?php

namespace App\Http\Controllers;

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

    public function insertberkaspendukung(Request $request, $id)
    {
        $request->validate([
            'nama_berkas' => 'required',
            'file_berkas' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file_berkas');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Menyimpan berkas ke dalam direktori penyimpanan
        $file->move(public_path('uploads'), $fileName);

        // Menyimpan informasi berkas ke dalam database
        UpBerkas::create([
            'nama_berkas' => $request->input('nama_berkas'),
            'file_path' => $fileName,
            'pendaftaran_id' => $id,
        ]);

        return redirect()->back()->with('success', 'Berkas berhasil diunggah: ' . $fileName);
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
