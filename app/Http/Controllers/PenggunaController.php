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
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

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
            'email' => 'required|email|unique:penggunas', // Ensure email is unique
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $user = Pengguna::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('tambahdatapribadi');
        }

        $errors = [];

        if (!$user) {
            $errors['email'] = 'Email tidak tersedia';
        }

        if ($user && !Hash::check($credentials['password'], $user->password)) {
            $errors['password'] = 'Password tidak valid';
        }

        // Jika keduanya salah, tambahkan pesan kesalahan umum
        if (!$user || ($user && !Hash::check($credentials['password'], $user->password))) {
            $errors['general'] = 'Email dan password tidak valid';
        }

        return redirect()->route('login')->withErrors($errors);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function index(Request $request) {
        $query = DataPendidikan::query();
    
        if ($request->has('search')) {
            $query->where('jenjang', 'LIKE', '%' . $request->search . '%');
        }
    
        $data = $query->paginate(5);
        Session::put('halaman_url', request()->fullUrl());
    
        return view('tambahdatapendidikan', compact('data'));
    }
    


    public function tambahdatapribadi(){
        // Mendapatkan pengguna_id dari pengguna yang saat ini login
        $penggunaId = Auth::id();

        // Memeriksa apakah data pribadi sudah ada untuk pengguna yang saat ini login
        $dataPribadi = DataPribadi::where('pengguna_id', $penggunaId)->first();

        // Jika data pribadi belum ada, izinkan pengguna untuk menambahkannya
        if ($dataPribadi) {
            $data = DataPribadi::find($penggunaId);
            return view('editdatapribadi', compact('data'));
        } else {
            return view('datapribadi');
        }
    }

    // ngejalanin bagaimana memasukan data dalam database
    public function insertdata(Request $request)
    {
        $request->validate([
            'poto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Menambahkan validasi untuk file gambar
            // Tambahkan aturan validasi lainnya jika diperlukan
        ]);

        // Simpan foto ke direktori penyimpanan
        $fileName = $request->file('poto')->getClientOriginalName();
        $request->file('poto')->move(public_path('berkastambahan'), $fileName);

        // Menyimpan informasi data pribadi ke dalam database
        $data = DataPribadi::create([
            'pengguna_id' => Auth::id(),
            'poto' => $fileName,
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

        return redirect()->route('tambahdatapribadi', ['id' => $dataId])->with('success', 'Data Berhasil di Simpan');
    }

    public function editdatapribadi($id){
        $data = DataPribadi::find($id);
        return view('editdatapribadi', compact('data'));
    }

    public function updatedatapribadi(Request $request, $id) {
        $data = DataPribadi::find($id);
    
        // Check if a new photo is uploaded
        if ($request->hasFile('poto')) {
            // Validate the uploaded image
            $request->validate([
                'poto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust validation rules as needed
            ]);
    
            // Remove the old photo file
            if (file_exists(public_path('berkastambahan/' . $data->poto))) {
                unlink(public_path('berkastambahan/' . $data->poto));
            }
    
            // Move the new photo to the storage directory
            $fileName = $request->file('poto')->getClientOriginalName();
            $request->file('poto')->move(public_path('berkastambahan'), $fileName);
    
            // Update the photo field in the database
            $data->update(['poto' => $fileName]);
        }
    
        // Update other fields in the database
        $data->update($request->except('poto'));
    
        return redirect()->route('tambahdatapribadi', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
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
            'jenjang' => $request->jenjang,
            'gelar' => $request->gelar,
            'institusipendidikan' => $request->institusipendidikan,
            'prestasiakademik' => $request->prestasiakademik,
            'tahunakademik' => $request->tahunakademik,
        ]);
        return redirect()->route('tambahdatapendidikan')->with('success', 'Data Berhasil di Simpan');
    }

    public function editdatapendidikan($id){
        $data = DataPendidikan::find($id);
        return view('editdatapendidikan', compact('data'));
    }

    public function updatedatapendidikan(Request $request, $id) {
        $data = DataPendidikan::find($id);

        $data->update($request->all());

        return redirect()->route('tambahdatapendidikan', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
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

    public function updatedatapekerjaan(Request $request, $id) {
        $data = DataPekerjaan::find($id);

        $data->update($request->all());

        return redirect()->route('tambahdatapekerjaan', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
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

    public function updatedataskill(Request $request, $id) {
        $data = DataSkill::find($id);

        $data->update($request->all());

        return redirect()->route('tambahdataskill', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
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
        $fileName = $request->file('uploadberkas')->getClientOriginalName();
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

    public function updateberkaspendukung(Request $request, $id) {
        $data = UpBerkas::find($id);

        $data->update($request->all());

        return redirect()->route('tambahberkaspendukung', ['id' => $id])->with('success', 'Data Berhasil di Simpan');
    }

    public function editberkaspendukung($id){
        $data = UpBerkas::find($id);
        return view('editberkaspendukung', compact('data'));
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

    public function lihatcv1() {
        $user = Auth::id();

        $dataPribadi = DataPribadi::where('pengguna_id', $user)->get();
        $dataPendidikan = DataPendidikan::where('pengguna_id', $user)->get();
        $dataPekerjaan = DataPekerjaan::where('pengguna_id', $user)->get();
        $dataSkill = DataSkill::where('pengguna_id', $user)->get();
        $upBerkas = UpBerkas::where('pengguna_id', $user)->get();

        $data = [
            'dataPribadi' => $dataPribadi,
            'dataPendidikan' => $dataPendidikan,
            'dataPekerjaan' => $dataPekerjaan,
            'dataSkill' => $dataSkill,
            'upBerkas' => $upBerkas,
        ];

        return view('template1', $data);
    }

    public function lihatcv2() {
        $user = Auth::id();

        $dataPribadi = DataPribadi::where('pengguna_id', $user)->get();
        $dataPendidikan = DataPendidikan::where('pengguna_id', $user)->get();
        $dataPekerjaan = DataPekerjaan::where('pengguna_id', $user)->get();
        $dataSkill = DataSkill::where('pengguna_id', $user)->get();
        $upBerkas = UpBerkas::where('pengguna_id', $user)->get();

        $data = [
            'dataPribadi' => $dataPribadi,
            'dataPendidikan' => $dataPendidikan,
            'dataPekerjaan' => $dataPekerjaan,
            'dataSkill' => $dataSkill,
            'upBerkas' => $upBerkas,
        ];

        return view('template2', $data);
    }

    public function downloadPDF1(){
        $user = Auth::id();

        $dataPribadi = DataPribadi::where('pengguna_id', $user)->get();
        $dataPendidikan = DataPendidikan::where('pengguna_id', $user)->get();
        $dataPekerjaan = DataPekerjaan::where('pengguna_id', $user)->get();
        $dataSkill = DataSkill::where('pengguna_id', $user)->get();
        $upBerkas = UpBerkas::where('pengguna_id', $user)->get();
        
        $data = [
            'dataPribadi' => $dataPribadi,
            'dataPendidikan' => $dataPendidikan,
            'dataPekerjaan' => $dataPekerjaan,
            'dataSkill' => $dataSkill,
            'upBerkas' => $upBerkas,
        ];

        // Create an instance of the PDF class
        $pdf = app('dompdf.wrapper');

        // Set options for this specific PDF instance
        $pdf->setOptions([
            'dpi' => 150,
            'defaultFont' => 'Roboto',
            'margin-top' => 20,
            'margin-right' => 50,
            'margin-bottom' => 20,
            'margin-left' => 20,
        ]);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait'); // Adjust 'A4' and 'portrait' based on your requirements

        // Load the view
        $pdf->loadView('template1', $data);

        // Download the PDF
        return $pdf->stream('template1.pdf', array('Attachment' => false));
    }

    public function downloadPDF2(){
        $user = Auth::id();

        $dataPribadi = DataPribadi::where('pengguna_id', $user)->get();
        $dataPendidikan = DataPendidikan::where('pengguna_id', $user)->get();
        $dataPekerjaan = DataPekerjaan::where('pengguna_id', $user)->get();
        $dataSkill = DataSkill::where('pengguna_id', $user)->get();
        $upBerkas = UpBerkas::where('pengguna_id', $user)->get();
        
        $data = [
            'dataPribadi' => $dataPribadi,
            'dataPendidikan' => $dataPendidikan,
            'dataPekerjaan' => $dataPekerjaan,
            'dataSkill' => $dataSkill,
            'upBerkas' => $upBerkas,
        ];

        // Create an instance of the PDF class
        $pdf = app('dompdf.wrapper');

        // Set options for this specific PDF instance
        $pdf->setOptions([
            'dpi' => 150,
            'defaultFont' => 'Roboto',
            'margin-top' => 20,
            'margin-right' => 50,
            'margin-bottom' => 20,
            'margin-left' => 20,
        ]);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait'); // Adjust 'A4' and 'portrait' based on your requirements

        // Load the view
        $pdf->loadView('template2', $data);

        // Download the PDF
        return $pdf->stream('template2.pdf', array('Attachment' => false));
    }

}
