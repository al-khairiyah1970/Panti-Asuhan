<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>Tambah Data</title>
</head>
<body>
    @include('admin.layouts.header')

    <main class="container mx-auto mt-5 pb-3">
        <h1>Tambah Data Profile</h1>
        <div class="border-top mt-5 pt-5">
            <form action="{{ route('simpan_profile_aksi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="textDeskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="textDeskripsi" name="isi" required value="{{ $profile->isi }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="addFile">Pilih gambar</label>
                    <input type="file" class="form-control-file" id="addFile" name="img">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
