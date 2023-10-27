<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>CVYou | Data Pekerjaan </title>
</head>

<body>
  @extends('layouts.main')
  @section('container')

  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  <h1 class="text-center mb-4">Data Pekerjaan</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('insertdatapekerjaan', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="examplePengalaman" class="form-label">Pengalaman Kerja</label>
                <input type="text" name="pengalaman" class="form-control" id="exampleInputPengalaman" aria-describedby="emailHelp" value="{{ $data->pengalaman }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputDeskripsi" class="form-label">Deskripsi Tugas</label>
                <textarea name="deskripsi" class="form-control" id="exampleInputDeskripsi" aria-describedby="emailHelp">{{ $data->deskripsi }}</textarea>
              </div>
              <div class="mb-3">
                <label for="exampleInputPerusahaan" class="form-label">Perusahaan</label>
                <input type="text" name="perusahaan" class="form-control" id="exampleInputPerusahaan" aria-describedby="emailHelp" value="{{ $data->perusahaan }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputMulai" class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_awal" class="form-control" id="exampleInputMulai" aria-describedby="emailHelp" value="{{ $data->tanggal_awal }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputAkhir" class="form-label">Tanggal Berakhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" id="exampleInputAkhir" aria-describedby="emailHelp" value="{{ $data->tanggal_akhir }}">
              </div>
              <button class="btn btn-info" type="submit">
                Submit
              </button>
            </form>
            <div>
              <a href="{{ route('tambahdatapendidikan', ['id' => $data->id]) }}" class="btn btn-success">Back</a>
            </div>
            <div>
              <a href="{{ route('tambahberkaspendukung', ['id' => $data->id]) }}" class="btn btn-success">Next</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>