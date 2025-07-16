<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>BERANDA - ADMIN</title>
</head>
<body>
    @include('admin.layouts.header')

    {{-- Banner --}}
    <main class="container mx-auto mt-5 pb-3">
        <h1>Banner Beranda</h1>
        <div class="border-top mt-5 pt-5">
            <a href="{{ route('add_banner') }}" class="btn btn-outline-success">Tambah Data</a>
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
                                @if(count($banner) > 0)
                                    @foreach ($banner as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>
                                            <a href="{{ route('edit_banner', ['id' => $data->id]) }}" class="btn btn-outline-primary">Edit</a>
                                            <a href="{{ route('delete_banner_aksi', $data->id) }}"
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

    {{-- Profile --}}
    <main class="container mx-auto mt-5 pb-3">
        <h1>Profile Panti</h1>
        <div class="border-top mt-5 pt-5">
            <!--<a href="{{ route('add_profile') }}" class="btn btn-outline-success">Tambah Data</a>-->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <br>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $profile->isi }}</td>
                                    <td>
                                        <a href="{{ route('edit_profile') }}" class="btn btn-outline-primary">Edit</a>
                                        {{-- <button type="button" class="btn btn-outline-danger">Hapus</button> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Visi --}}
    <main class="container mx-auto mt-5 pb-3">
        <h1>Visi</h1>
        <div class="border-top mt-5 pt-5">
          <!--<a href="{{ route('add_visi') }}" class="btn btn-outline-success">Tambah Data</a>-->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <br>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $visi->isi }}</td>
                                    <td>
                                        <a href="{{ route('edit_visi') }}" class="btn btn-outline-primary">Edit</a>
                                        {{-- <button type="button" class="btn btn-outline-danger">Hapus</button> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Misi --}}
    <main class="container mx-auto mt-5 pb-3">
        <h1>Misi</h1>
        <div class="border-top mt-5 pt-5">
            <a href="{{ route('add_misi') }}" class="btn btn-outline-success">Tambah Data</a>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <br>
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
                                @if(count($misi) > 0)
                                    @foreach ($misi as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->isi }}</td>
                                        <td>
                                            <a href="{{ route('edit_misi', ['id' => $data->id]) }}" class="btn btn-outline-primary">Edit</a>
                                            <a href="{{ route('delete_misi_aksi', $data->id) }}"
                                                onclick="return confirmDelete(event);"
                                                class="btn btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" style="text-align: center;">Tidak ada data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Tujuan --}}
    <main class="container mx-auto mt-5 pb-3">
        <h1>Tujuan</h1>
        <div class="border-top mt-5 pt-5">
            <a href="{{ route('add_tujuan') }}" class="btn btn-outline-success">Tambah Data</a>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <br>
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
                                @if(count($tujuan) > 0)
                                    @foreach ($tujuan as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->isi }}</td>
                                        <td>
                                            <a href="{{ route('edit_tujuan', ['id' => $data->id]) }}" class="btn btn-outline-primary">Edit</a>
                                            <a href="{{ route('delete_tujuan_aksi', $data->id) }}"
                                                onclick="return confirmDelete(event);"
                                                class="btn btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" style="text-align: center;">Tidak ada data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Donasi --}}
    <main class="container mx-auto mt-5 pb-3">
        <h1>Donasi</h1>
        <div class="border-top mt-5 pt-5">
            <a href="{{ route('add_donasi') }}" class="btn btn-outline-success">Tambah Data</a>
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
                                @if(count($donasi) > 0)
                                    @foreach ($donasi as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->nama_donasi }}</td>
                                        <td>{{ $data->deskripsi_donasi }}</td>
                                        <td>
                                            @if($data->terkumpul_donasi == 0)
                                                <a href="{{ route('edit_donasi', ['id' => $data->id]) }}" class="btn btn-outline-primary">Edit</a>
                                                <a href="{{ route('delete_donasi_aksi', ['id' => $data->id]) }}"
                                                    onclick="return confirmDelete(event);"
                                                    class="btn btn-outline-danger">Hapus</a>
                                            @else
                                                <p>Tidak dapat melakukan pengubahan</p>
                                            @endif
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
