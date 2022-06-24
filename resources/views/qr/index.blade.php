<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generate Qr</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="card-title text-center">Generate Qr</h5>
                            <form action="{{ url('generate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="control-label">Nama </label>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="control-label">Keperluan </label>
                                            <input type="text"
                                                class="form-control @error('Keperluan') is-invalid @enderror"
                                                name="Keperluan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="control-label">Tanggal</label>
                                            <input type="date"
                                                class="form-control @error('tanggal') is-invalid @enderror"
                                                name="tanggal">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="control-label">Logo</label>
                                        <div class="input-group mb-3">
                                            <input type="file"
                                                class="form-control @error('putGroupFile02') is-invalid @enderror"
                                                id="inputGroupFile02" name="logo">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-dark float-end">Generate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
