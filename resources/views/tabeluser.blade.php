<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CVYou | Data Pengguna </title>
    <link href="{{ asset('path-to-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="text-center mb-4">Data Pengguna</h1>

    <div class="container">
        <div class="row g-3 align-items-center mb-1">
            <div class="col-auto">
                <form action="/tabeluser" method="GET">
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Pendidikan Formal</th>
                    <th scope="col">Gelar</th>
                    <th scope="col">Institusi Pendidikan</th>
                    <th scope="col">Prestasi Akademik</th>
                    <th scope="col">Keterampilan</th>
                    <th scope="col">Pengalaman Kerja</th>
                    <th scope="col">Deskripsi Tugas</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <th scope="col">Sertifikat</th>
                    <th scope="col">Surat Rekomendasi</th>
                    <th scope="col">portofolio</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $index => $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->firstnm }}</td>
                    <td>{{ $row->lastnm }}</td>
                    <td>{{ $row->tempatlahir }}</td>
                    <td>{{ $row->tgllahir }}</td>
                    <td>{{ $row->email }}</td>
                    <td>0{{ $row->notelpon }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->pendidikanformal}}</td>
                    <td>{{ $row->gelar}}</td>
                    <td>{{ $row->institusipendidikan}}</td>
                    <td>{{ $row->prestasiakademik}}</td>
                    <td>{{ $row->keterampilan}}</td>
                    <td>{{ $row->pengalaman }}</td>
                    <td>{{ $row->deskripsi }}</td>
                    <td>{{ $row->perusahaan }}</td>
                    <td>{{ $row->sertifikat }}</td>
                    <td>{{ $row->suratrekomendasi }}</td>
                    <td>{{ $row->portofolio }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_awal)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_akhir)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}</td>
                    <td>
                        <a href="/editdatapekerjaan/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                        <!-- <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete swal</a> -->
                        <a href="/delete/{{ $row->id }}" type="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/editdatapekerjaan/{{ $row->id }}" type="button" class="btn btn-primary">Submit</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<!-- <script>
    $('.delete').click(function() {
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
                    window.location = "/delete/" + id +
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
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script> -->

</html>