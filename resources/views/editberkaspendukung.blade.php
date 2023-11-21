<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Berkas Pendukung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Berkas Pendukung</h1>

        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updateberkaspendukung/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="examplejenisberkas" class="form-label">Jenis Berkas</label>
                                    <select name="jenis_berkas" class="form-select" id="examplejenisberkas">
                                        <option value="sertifikat" {{ $data->jenisberkas === 'sertifikat' ? 'selected' : '' }}>Sertifikat</option>
                                        <option value="suratrekomendasi" {{ $data->jenisberkas === 'suratrekomendasi' ? 'selected' : '' }}>Surat Rekomendasi</option>
                                        <option value="portofolio" {{ $data->jenisberkas === 'portofolio' ? 'selected' : '' }}>Portofolio</option>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputgelar" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="exampleInputsuratrekomendasi" aria-describedby="emailHelp" value="{{ $data->judul }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputDeskripsi" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="exampleInputDeskripsi" aria-describedby="emailHelp">{{ $data->keterangan }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputgelar" class="form-label">Upload Berkas</label>
                                    @if($data->berkas)
                                        <p>File yang sudah diunggah: {{ $data->berkas }}</p>
                                    @endif
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