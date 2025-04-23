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
        <h1>Tambah Data Admin</h1>
        <div class="border-top mt-5 pt-5">
            <form method="POST" enctype="multipart/form-data" action="{{ route('add_superadmin_aksi') }}">
                @csrf
                <div class="col-md-12">
                    <label for="textDeskripsi" class="form-label">Nama</label>
                    <input required type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-12">
                    <label for="textDeskripsi" class="form-label">Email</label>
                    <input required type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-12">
                    <label for="textDeskripsi" class="form-label">Username</label>
                    <input required type="text" class="form-control" id="username" name="username">
                </div>
                <div class="col-md-12">
                    <label for="textDeskripsi" class="form-label">Password</label>
                    <input required type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-md-12">
                    <label for="textDeskripsi" class="form-label">Role</label>
                    <select required class="form-control" id="role" name="role">
                        <option selected disabled>Pilih Role</option>
                        <option value="SA">Super Admin</option>
                        <option value="AD">Admin</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
