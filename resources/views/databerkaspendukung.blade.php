<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>CVYou | Berkas Pendukung </title>
</head>

<body>
  @extends('layouts.main')
  @section('container')

  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  <h1 class="text-center mb-4">Berkas Pendukung</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('insertberkaspendukung', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sertifikat</label>
                <input type="file" name="sertifikat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->sertifikat }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Rekomendasi</label>
                <input type="file" name="suratrekomendasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->suratrekomendasi }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Portofolio</label>
                <input type="file" name="portofolio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->portofolio }}">
              </div>
              <a href="/output" type="button" class="btn btn-primary">Submit</a>
            </form>
            <div>
              <a href="{{ route('tambahdatapekerjaan', ['id' => $data->id]) }}" class="btn btn-success">Back</a>
            </div>
            <div>
              <!-- <a href="{{ route('tambahdatapekerjaan', ['id' => $data->id]) }}" class="btn btn-success">Next</a> -->
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