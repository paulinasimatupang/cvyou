<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>CVYou | Berkas Pendukung </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('path-to-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
              <form action="{{ route('insertberkaspendukung') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="examplejenisberkas" class="form-label">Jenis Berkas</label>
                  <select name="jenis_berkas" class="form-select" id="examplejenisberkas">
                      <option value="sertifikat">Sertifikat</option>
                      <option value="suratrekomendasi">Surat Rekomendasi</option>
                      <option value="portofolio">Portofolio</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputgelar" class="form-label">Judul</label>
                  <input type="text" name="judul" class="form-control" id="exampleInputsuratrekomendasi" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputinstitusipendidikan" class="form-label">Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" id="exampleInputportofolio" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputgelar" class="form-label">Upload Berkas</label>
                  <input type="file" name="uploadberkas" class="form-control" id="exampleInputsuratrekomendasi" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><br><br><br>

    <h1 class="text-center mb-4">Berkas Pendukung</h1>

    <div class="container">
      {{-- <a href="/tambahberkaspendukung" class="btn btn-success mb-3">Tambah +</a> --}}
      <div class="row g-3 align-items-center mb-1">
        <div class="col-auto">
          <form action="/tabel1" method="GET">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
          </form>
        </div>
      </div>
      <div class="row">
        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
        </div>
        @endif --}}
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Jenis Berkas</th>
              <th scope="col">Judul</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Berkas</th>
              <th scope="col">AKsi</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($data as $index => $row)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $row->jenisberkas }}</td>
              <td>{{ $row->judul }}</td>
              <td>{{ $row->keterangan }}</td>
              <td>{{ $row->berkas }}</td>
              <td>
                <a href="/editberkaspendukung/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                <a href="/deleteberkaspendukung/{{ $row->id }}" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- {{-- {{ $data->links() }} --}} -->
      </div>
      <!-- <a href="/output" type="button" class="btn btn-primary">Submit</a> -->
    </div>
  @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
    $('.delete').click( function() {
      var pekerjaanid = $(this).attr('data-id');
      swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data ini!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/deleteberkaspendukung/"+berkasId+
          swal("Data berhasil dihapus!", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi dihapus!");
        }
      });
    });
  </script>
  <script>
    // @if (Session::has('success'))
    // toastr.success("{{ Session::get('success') }}")
    // @endif
  </script>
</html>
