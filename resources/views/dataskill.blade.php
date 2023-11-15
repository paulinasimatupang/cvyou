<!doctype html>
<html lang="en">
  <head>
    <style>
        .rating {
            display: flex;
            align-items: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ddd;
            margin: 0;
        }

        .rating label:before {
            content: '\2605';
            font-size: 25px;
            padding: 5px;
            padding-bottom: 0;
            cursor: pointer;
        }

        .rating input:checked ~ label {
            color: #FFD700;
        }
    </style>


    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>CVYou | Data Skill</title>
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

    <h1 class="text-center mb-4">Data Skill</h1>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <form action="/insertdataskill" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="examplePengalaman" class="form-label">Skill</label>
                  <input type="text" name="skill" class="form-control" id="exampleInputPengalaman" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputRating" class="form-label">Rating</label>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="1">
                        <label for="1" id="star1"></label>
                        <input type="radio" name="rating" value="4" id="2">
                        <label for="2"></label>
                        <input type="radio" name="rating" value="3" id="3">
                        <label for="3"></label>
                        <input type="radio" name="rating" value="2" id="4">
                        <label for="4"></label>
                        <input type="radio" name="rating" value="1" id="5">
                        <label for="5"></label>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><br><br><br>

    <h1 class="text-center mb-4">Riwayat Skill</h1>

    <div class="container text-center">
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
                      <th></th>
                      <th></th>
                      <th></th>
                      <th scope="col">No.</th>
                      <th scope="col">Skill</th>
                      <th scope="col">Rating</th>
                      <th scope="col">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach ($data as $index => $row)
                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $row->skill }}</td>
                      <td>{{ $row->rating }}</td>
                      <td>
                          <a href="/editdataskill/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                          <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete</a>
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
          window.location = "/deletepekerjaan/"+pekerjaanid+
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
