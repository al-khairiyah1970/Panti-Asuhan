<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>ANAK ASUH - ADMIN</title>
</head>
<body>
    @include('admin.layouts.header')

    <main class="container mx-auto mt-5 pb-3">
        <h1>Gambar Terkait Anak Asuh</h1>
        <div class="border-top mt-5 pt-5">
            <a href="{{ route('add_gambar_anak') }}" class="btn btn-outline-success">Tambah Data</a>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <br>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if(count($gambar) > 0)
                                    @foreach ($gambar as $data)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $data->judul }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('edit_gambar_anak', ['id' => $data->id]) }}" class="btn btn-outline-primary">Edit</a>
                                                <a href="{{ route('delete_gambar_anak_aksi', $data->id) }}"
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

    <main class="container mx-auto mt-5 pb-3">
        <h1>Anak Asuh</h1>
        <div class="border-top mt-5 pt-5">
            <a href="{{ route('add_anak') }}" class="btn btn-outline-success">Tambah Data</a>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <br>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">USIA</th>
                                    <th scope="col">ASAL DAERAH</th>
                                    <th scope="col">PENDIDIKAN</th>
                                    <th scope="col">PRESTASI</th>
                                    <th scope="col">CITA-CITA</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if(count($anak) > 0)
                                    @foreach ($anak as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->usia }} Tahun</td>
                                        <td>{{ $data->asal_daerah }}</td>
                                        <td>{{ $data->pendidikan }}</td>
                                        <td>{{ $data->prestasi }}</td>
                                        <td>{{ $data->cita_cita }}</td>
                                        <td>
                                            <a href="{{ route('edit_anak', ['id' => $data->id]) }}" class="btn btn-outline-primary">Edit</a>
                                            <a href="{{ route('delete_anak_aksi', $data->id) }}"
                                                onclick="return confirmDelete(event);"
                                                class="btn btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" style="text-align: center;">Tidak ada data</td>
                                    </tr>
                                @endif
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
