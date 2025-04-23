<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title> STRUKTUR KEPENGURUSAN - ADMIN</title>
</head>
<body>
    @include('admin.layouts.header')

    <main class="container mx-auto mt-5 pb-3">
        <h1>Struktur Kepengurusan</h1>
        <div class="border-top mt-5 pt-5">
            {{-- <a href="{{ route('add_kepengurusan') }}" class="btn btn-outline-success mb-4">Tambah Data</a> --}}
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if(count($kepengurusan) > 0)
                                    @foreach ($kepengurusan as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>
                                            <a href="{{ route('edit_kepengurusan', ['id' => $data->id]) }}" class="btn btn-outline-primary">Edit</a>
                                            <a href="{{ route('delete_kepengurusan_aksi', ['id' => $data->id]) }}"
                                                onclick="return confirmDelete(event);"
                                                class="btn btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;">Tidak ada data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
