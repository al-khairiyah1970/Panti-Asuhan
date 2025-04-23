<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>PROGRAM</title>
</head>
<body>
    @include('landing.layouts.header')

    <br>

    @if(count($mingguan) > 0)
        <div class="container text-center">
            <h2>PROGRAM MINGGUAN</h2>
        </div>
        <br>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            @php
                $jml = count($mingguan);
                $i = 0;
            @endphp
            <div class="carousel-indicators">
                @for($i = 0; $i < $jml; $i++)
                    @if($i == 0)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @else
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i }}"></button>
                    @endif
                @endfor
            </div>
            <div class="carousel-inner">
                @for($i = 0; $i < $jml; $i++)
                    @if($i == 0)
                        <div class="carousel-item active">
                            <img src="{{ asset('uploads/program/mingguan/'.$mingguan[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $mingguan[$i]->judul }}</h5>
                                <p>{{ $mingguan[$i]->deskripsi }}</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/program/mingguan/'.$mingguan[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $mingguan[$i]->judul }}</h5>
                                <p>{{ $mingguan[$i]->deskripsi }}</p>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
            @if($jml > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>
        <br>
    @endif

    @if(count($bulanan) > 0)
        <div class="container text-center">
            <h2>PROGRAM BULANAN</h2>
        </div>
        <br>
        <div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="false">
            @php
                $jml = count($bulanan);
                $i = 0;
            @endphp
            <div class="carousel-indicators">
                @for($i = 0; $i < $jml; $i++)
                    @if($i == 0)
                        <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @else
                        <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i }}"></button>
                    @endif
                @endfor
            </div>
            <div class="carousel-inner">
                @for($i = 0; $i < $jml; $i++)
                    @if($i == 0)
                        <div class="carousel-item active">
                            <img src="{{ asset('uploads/program/bulanan/'.$bulanan[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $bulanan[$i]->judul }}</h5>
                                <p>{{ $bulanan[$i]->deskripsi }}</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/program/bulanan/'.$bulanan[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $bulanan[$i]->judul }}</h5>
                                <p>{{ $bulanan[$i]->deskripsi }}</p>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
            @if($jml > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>
        <br>
    @endif

    @if(count($tahunan) > 0)
        <div class="container text-center">
            <h2>PROGRAM TAHUNAN</h2>
        </div>
        <br>
        <div id="carouselExampleCaptions3" class="carousel slide" data-bs-ride="false">
            @php
                $jml = count($tahunan);
                $i = 0;
            @endphp
            <div class="carousel-indicators">
                @for($i = 0; $i < $jml; $i++)
                    @if($i == 0)
                        <button type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @else
                        <button type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i }}"></button>
                    @endif
                @endfor
            </div>
            <div class="carousel-inner">
                @for($i = 0; $i < $jml; $i++)
                    @if($i == 0)
                        <div class="carousel-item active">
                            <img src="{{ asset('uploads/program/tahunan/'.$tahunan[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $tahunan[$i]->judul }}</h5>
                                <p>{{ $tahunan[$i]->deskripsi }}</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/program/tahunan/'.$tahunan[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $tahunan[$i]->judul }}</h5>
                                <p>{{ $tahunan[$i]->deskripsi }}</p>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
            @if($jml > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>
    @endif

    @if(count($mingguan) == 0 && count($bulanan) == 0 && count($tahunan) == 0)
        <div class="container text-center">
            <h2>PROGRAM TIDAK DITEMUKAN</h2>
        </div>
    @endif

    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>