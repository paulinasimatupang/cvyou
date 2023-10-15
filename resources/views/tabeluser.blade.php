<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CVYou | Data Pengguna </title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pengguna</h1>

    <div class="container">
      <div class="row">
        @if ($message = Session::get('succes'))
          <div class="alert alert-success" role="alert">
            {{ $message }}
          </div>
        @endif
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Email</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $row)
              <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->firstnm }}</td>
                <td>{{ $row->lastnm }}</td>
                <td>{{ $row->tempatlahir }}</td>
                <td>{{ $row->email }}</td>
                <td>0{{ $row->notelpon }}</td>
                <td>{{ $row->alamat }}</td>
                <td>
                  <button type="button" class="btn btn-danger">Delete</button>
                  <button type="button" class="btn btn-info">Edit</button>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
      </div>
      <a href="/tambahdatapribadi" class="btn btn-dark">Tambah Data</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
  </body>
</html>