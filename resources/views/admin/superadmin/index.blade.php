<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>SUPERADMIN</title>
</head>
<body>
    @include('admin.layouts.header')

    <main class="container mx-auto mt-5 pb-3">
        <h1>DATA ADMIN</h1>
        <div class="border-top mt-5 pt-5">
            <a href="{{ route('add_superadmin') }}" class="btn btn-outline-success">Tambah Data</a>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                        <br>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">ROLE</th>
                            <th scope="col">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($query as $admin)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $admin['username'] }}</td>
                                    <td>
                                        @if($admin['role'] == 'SA')
                                            Super Admin
                                        @else
                                            Admin
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit_superadmin', ['id' => $admin->id]) }}" class="btn btn-outline-primary">Edit</a>
                                        @if($admin['username'] !== \Auth::user()->username)
                                        <a href="{{ route('delete_superadmin_aksi', ['id' => $admin->id]) }}"
                                            onclick="return confirmDelete(event);"
                                            class="btn btn-outline-danger">Hapus</a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function confirmDelete(event) {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini ?')) {
                event.preventDefault(); // Prevent the link from navigating if user clicks "Cancel"
                return false;
            }
            return true;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
