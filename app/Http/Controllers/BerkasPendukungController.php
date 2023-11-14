<?php

namespace App\Http\Controllers;

use App\Models\UpBerkas;
use Illuminate\Http\Request;

class BerkasPendukungController extends Controller
{
    public function tambahberkaspendukung($id)
    {
        // Logika untuk menampilkan formulir tambah berkas pendukung
        $data = UpBerkas::find($id);
        return view('databerkaspendukung', ['data' => $data]);
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
    
}
