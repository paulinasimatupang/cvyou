<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Riwayat Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Data Pendidikan</h1>

        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatependidikan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputpendidikanformal" class="form-label">Pendidikan Formal</label>
                                    <input type="text" name="pendidikanformal" class="form-control" id="exampleInputpendidikanformal" aria-describedby="emailHelp" value="{{ $data->pendidikanformal }}">
                                </div>
                               <div class="mb-3">
                                    <label for="exampleInputgelar" class="form-label">Gelar</label>
                                     <input type="text" name="gelar" class="form-control" id="exampleInputgelar" aria-describedby="emailHelp" value="{{ $data->gelar }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputinstitusipendidikan" class="form-label">Institusi Pendidikan</label>
                                    <input type="text" name="institusipendidikan" class="form-control" id="exampleInputinstitusipendidikan" aria-describedby="emailHelp" value="{{ $data->institusipendidikan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtahunakademik" class="form-label">Tahun Akademik</label>
                                    <input type="text" name="tahunakademik" class="form-control" id="exampleInputtahunakademik" aria-describedby="emailHelp">
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