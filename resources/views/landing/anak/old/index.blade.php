<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>ANAK ASUH</title>
</head>
<body>
    @include('landing.layouts.header')

    <table class="table">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA</th>
            <th scope="col">USIA</th>
            <th scope="col">ASAL DAERAH</th>
            <th scope="col">PENDIDIKAN</th>
            <th scope="col">PRESTASI</th>
            <th scope="col">CITA-CITA</th>
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
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data</td>
                </tr>
            @endif

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
