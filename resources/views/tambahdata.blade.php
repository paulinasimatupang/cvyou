<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Riwayat Pekerjaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Tambah Data Pekerjaan</h1>

        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="examplePengalaman" class="form-label">Pengalaman Kerja</label>
                                    <input type="text" name="pengalaman" class="form-control" id="exampleInputPengalaman" aria-describedby="emailHelp">
                                </div>
                               <div class="mb-3">
                                    <label for="exampleInputDeskripsi" class="form-label">Deskripsi Tugas</label>
                                     <textarea name="deskripsi" class="form-control" id="exampleInputDeskripsi" aria-describedby="emailHelp"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPerusahaan" class="form-label">Perusahaan</label>
                                    <input type="text" name="perusahaan" class="form-control" id="exampleInputPerusahaan" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputMulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_awal" class="form-control" id="exampleInputMulai" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputAkhir" class="form-label">Tanggal Berakhir</label>
                                    <input type="date" name="tanggal_akhir" class="form-control" id="exampleInputAkhir" aria-describedby="emailHelp">
                                @error('tanggal_akhir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </body>
</html>