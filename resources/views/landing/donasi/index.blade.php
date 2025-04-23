<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>DONASI</title>
</head>
<body>
    @include('landing.layouts.header')

    <div class="container text-center">
        <h2>DONASI</h2>
    </div>
    <div class="row">

        @if(count($donasi) > 0)
            @foreach($donasi as $data)
                <div class="col-sm-6">
                    <div class="card">
                        <img src="{{ asset('uploads/donasi/'.$data->img_donasi) }}" class="card-img-top" alt="{{ $data->nama_donasi }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_donasi }}</h5>
                            <p class="card-text">{{ $data->deskripsi_donasi }}</p>
                            <h6>Rp{{ number_format($data->target_donasi, 2, ',', '.') }}</h6>
                            @php
                                $progress = ($data->terkumpul_donasi / $data->target_donasi) * 100;
                                $progress_fix = round($progress);
                                // $progress = min($progress, 100);
                                // $progress = max($progress, 0);
                            @endphp
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress_fix }}%;" aria-valuenow="{{ $progress_fix }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $progress_fix }}%
                                </div>
                            </div>
                            <br>
                            <a href="{{ url('/donasi/proses/'.$data->id.'') }}" class="btn btn-primary">DONASI</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p style="text-align:center">Tidak ada data</p>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
