<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\DataSkill;
use App\Models\DataPribadi;
use App\Models\DataPendidikan;
use App\Models\DataPekerjaan;
use App\Models\UpBerkas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            ],
            // tambahkan aturan lainnya jika diperlukan
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses pembaruan profil di sini
        $user = Pengguna::find($id);

        // Memeriksa apakah password baru disetel
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Tambahkan proses pembaruan atribut lainnya sesuai kebutuhan

        $user->save();

        return redirect('profile')->with('success', 'Profil berhasil diperbarui');
    }


    public function showRegistrationForm()
    {
        return view('Register');
    }

    public function register(Request $request)
    {
        // Validasi data pendaftaran di sini jika diperlukan
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            ],
            // tambahkan aturan lainnya jika diperlukan
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Password harus terdiri dari minimal 8 karakter, 1 huruf besar, dan 1 angka.');
        }

        // Simpan pengguna baru ke database
        $user = Pengguna::create([
            'pengguna_id' => Str::uuid(),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Login pengguna setelah pendaftaran
        Auth::login($user);

        return redirect()->route('login');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('tambahdatapribadi');
        }
    
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function tambahdatapribadi(){
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();
    
        // Memeriksa apakah data pribadi sudah ada untuk pengguna yang saat ini login
        $dataPribadi = DataPribadi::where('pengguna_id', $penggunaId)->first();
    
        // Jika data pribadi belum ada, izinkan pengguna untuk menambahkannya
        if (!$dataPribadi) {
            return view('datapribadi');
        } else {
            // Jika data pribadi sudah ada, mungkin arahkan pengguna ke halaman lain
            // atau berikan pesan bahwa data pribadi sudah ada.
            return redirect()->route('tambahdatapendidikan')->with('message', 'Data pribadi sudah ada.');
        }
    }    

    // ngejalanin bagaimana memasukan data dalam database
    public function insertdata(Request $request){
        $data = DataPribadi::create([
            'pengguna_id' => Auth::id(),
            'poto' => $request->poto,
            'firstnm' => $request->firstnm,
            'lastnm' => $request->lastnm,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'email' => $request->email,
            'notelpon' => $request->notelpon,
            'alamat' => $request->alamat,
        ]);
        
        // Mengambil ID pengguna yang baru saja dibuat
        $dataId = $data->id;

        if ($request->hasFile('gambar')) {
            $fileName = time().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('berkastambahan'), $fileName);
            $data->gambar = $fileName; // Pastikan Anda mengatur atribut gambar pada model
            $data->save();
        }
        return redirect()->route('tambahdatapribadi', ['id' => $dataId])->with('success', 'Data Berhasil di Simpan');
    }
    
    // public function editDataPribadi($pengguna_id) {
    //     // Retrieve the data for the specified user
    //     $data = DataPribadi::where('pengguna_id', $pengguna_id)->first();

    //     // Check if the data exists
    //     if (!$data) {
    //         // You can handle the case where data doesn't exist, for example, redirect to an error page.
    //         return redirect()->route('error')->with('error', 'Data not found');
    //     }

    //     // Pass the data to the view along with the pengguna_id
    //     return view('editdatapribadi', compact('data', 'pengguna_id'));
    // }

    public function editDataPribadi($pengguna_id){
        $data = DataPribadi::find($pengguna_id);
        return view('editdatapribadi', compact('data'));
    }

    public function updateDataPribadi(Request $request, $pengguna_id) {
        // Validate the form data
        $validatedData = $request->validate([
            // Add validation rules for each field you want to validate
            'field1' => 'required',
            'field2' => 'required',
            // Add more fields as needed
        ]);

        // Update the data in the database
        DataPribadi::where('pengguna_id', $pengguna_id)->update($validatedData);

        // Redirect back to the edit page with a success message
        return redirect()->route('editdatapribadi', $pengguna_id)->with('success', 'Data updated successfully');
    }

    public function tambahdatapendidikan() {
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();

        // Mengambil data pendidikan hanya untuk pengguna yang saat ini login
        $data = DataPendidikan::where('pengguna_id', $penggunaId)->get();

        return view('datapendidikan', compact('data'));
    }

    public function insertdatapendidikan(Request $request) {
        DataPendidikan::create([
            'pengguna_id' => Auth::id(),
            'pendidikanformal' => $request->pendidikanformal,
            'gelar' => $request->gelar,
            'institusipendidikan' => $request->institusipendidikan,
            'prestasiakademik' => $request->prestasiakademik,
            'keterampilan' => $request->keterampilan,
        ]);
        return redirect()->route('tambahdatapendidikan')->with('success', 'Data Berhasil di Simpan');
    }

    public function editdatapendidikan($id){
        $data = DataPendidikan::find($id);
        return view('editdatapendidikan', compact('data'));
    }

    public function deletependidikan($id){
        $data = DataPendidikan::find($id);
        $data->delete();
        return redirect()->route('tambahdatapendidikan')->with('success', 'Data berhasil dihapus');
    }

    public function tambahdatapekerjaan(){
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();
    
        // Mengambil data pekerjaan hanya untuk pengguna yang saat ini login
        $data = DataPekerjaan::where('pengguna_id', $penggunaId)->get();
    
        return view('datapekerjaan', compact('data'));
    }

    public function insertpekerjaan(Request $request){
        $this->validate($request,[
            'tanggal_akhir' => 'after_or_equal:tanggal_awal'
        ], ['tanggal_akhir.after_or_equal' => 'Tanggal Berakhir harus setelah atau sama dengan Tanggal Mulai.',
        ]);
        
        DataPekerjaan::create([
            'pengguna_id' => Auth::id(),
            'pengalaman' => $request->pengalaman,
            'deskripsi' => $request->deskripsi,
            'perusahaan' => $request->perusahaan,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);
        
        return redirect()->route('tambahdatapekerjaan')->with('success', 'Data berhasil ditambahkan');
    }


    public function editdatapekerjaan($id){
        $data = DataPekerjaan::find($id);
        return view('editdatapekerjaan', compact('data'));
    }

    public function deletepekerjaan($id){
        $data = DataPekerjaan::find($id);
        $data->delete();
        return redirect()->route('tambahdatapekerjaan')->with('success', 'Data berhasil dihapus');
    }

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

    public function tambahberkaspendukung()
    {
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();

        // Mengambil data berkas pendukung hanya untuk pengguna yang saat ini login
        $data = UpBerkas::where('pengguna_id', $penggunaId)->get();

        return view('databerkaspendukung', compact('data'));
    }

    public function insertberkaspendukung(Request $request)
    {
        $request->validate([
            'jenisberkas' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
            'uploadberkas' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $penggunaId = auth()->id();

        // Simpan file ke direktori penyimpanan
        $fileName = time() . '_' . $request->file('uploadberkas')->getClientOriginalName();
        $request->file('uploadberkas')->move('berkastambahan', $fileName);

        // Menyimpan informasi berkas ke dalam database
        UpBerkas::create([
            'pengguna_id' => $penggunaId,
            'jenisberkas' => $request->jenisberkas,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'berkas' => $fileName,
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

    public function output() {
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();

        // Mengambil data berdasarkan pengguna_id yang sesuai
        $data = Pengguna::where('pengguna_id', $penggunaId)->get();

        return view(('output'), compact('data'));
    }

}
