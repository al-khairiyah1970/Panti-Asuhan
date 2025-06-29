<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>GANTI PASSWORD</title>
</head>
<body>
    @if(session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @elseif(session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif
    <div class="container center">
        <br>
        <form action="{{ route('ganti_password_aksi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="email" required readonly value="{{ $find['email'] }}">
            <input type="hidden" name="username" required readonly value="{{ $find['username'] }}">
            <div class="col-md-12">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
            </div>
            <div class="col-md-12">
                <label for="exampleInputPassword2" class="form-label">Tulis Ulang Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" required name="password">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
