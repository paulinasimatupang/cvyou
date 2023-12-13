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

    <title>Riwayat Skill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('path-to-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Data Skill</h1>

        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updateskill/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                  <label for="examplePengalaman" class="form-label">Skill</label>
                  <input type="text" name="skill" class="form-control" id="exampleInputPengalaman" aria-describedby="emailHelp" value="{{ $data->skill }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputRating" class="form-label">Rating</label>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="1">
                        <label for="1" id="star1">{{ $data->rating }}</label>
                        <input type="radio" name="rating" value="4" id="2">
                        <label for="2">{{ $data->rating }}</label>
                        <input type="radio" name="rating" value="3" id="3">
                        <label for="3">{{ $data->rating }}</label>
                        <input type="radio" name="rating" value="2" id="4">
                        <label for="4">{{ $data->rating }}</label>
                        <input type="radio" name="rating" value="1" id="5">
                        <label for="5">{{ $data->rating }}</label>
                    </div>
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