<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>ANAK ASUH</title>
</head>
<body>
        @include('landing.layouts.header')

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            @php
                $jml = count($gambar);
            @endphp
            @if($jml == 0)
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/beranda/image.png') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                        <div class="carousel-caption d-md-block">
                            <h5>Ini contoh</h5>
                            <p>contoh</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('assets/beranda/image2.png') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                        <div class="carousel-caption d-md-block">
                            <h5>Ini contoh</h5>
                            <p>contoh</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('assets/beranda/image1.png') }}" class="d-block w-100" alt="panti asuhan" style="height: 800px;">
                        <div class="carousel-caption d-md-block">
                            <h5>Ini contoh</h5>
                            <p>contoh</p>
                        </div>
                    </div>
                </div>
            @else
                @php
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
                                <img src="{{ asset('uploads/anak/'.$gambar[$i]->file.'') }}" class="d-block w-100" alt="{{ $gambar[$i]->judul }}" style="height: 800px;">
                                <div class="carousel-caption d-md-block">
                                    <h5>{{ $gambar[$i]->judul }}</h5>
                                    <p>{{ $gambar[$i]->deskripsi }}</p>
                                </div>
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset('uploads/anak/'.$gambar[$i]->file.'') }}" class="d-block w-100" alt="{{ $gambar[$i]->judul }}" style="height: 800px;">
                                <div class="carousel-caption d-md-block">
                                    <h5>{{ $gambar[$i]->judul }}</h5>
                                    <p>{{ $gambar[$i]->deskripsi }}</p>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            @endif

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

        <div class="container text-center">
            <h2 class="text">ANAK ASUH</h2>
            <br>
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
        </div>

        <br>

        <footer class="bg-success py-5 mt-5">
            <div class="container text-light text-center">
                <p class="display-10 mb-1">PANTI ASUHAN AL-KHAIRIYAH </p>
                <a href="https://www.facebook.com/m.husni.779857?rdid=VD1ipJ1goIRoPDqv&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F129frADCgf2%2F#" class="btn btn-success" role="button">Facebook</a>
                {{-- <a href="https://www.bing.com/search?pglt=169&q=BUTTON+ICON+BOOTSTRAP&cvid=e53828f686d442009f70ec6f29fcc07f&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQABhAMgYIAhAAGEDSAQg4MjQ0ajBqMagCALACAA&FORM=ANNTA1&PC=HCTS" class="btn btn-success" role="button">Twitter</a> --}}
                <a href="https://www.bing.com/search?pglt=169&q=BUTTON+ICON+BOOTSTRAP&cvid=e53828f686d442009f70ec6f29fcc07f&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQABhAMgYIAhAAGEDSAQg4MjQ0ajBqMagCALACAA&FORM=ANNTA1&PC=HCTS" class="btn btn-success" role="button">Instagram</a>
                <a href="https://wa.me/6283894333872" class="btn btn-success" role="button">Whatsapp</a>
                <br>
                <small class="text-white">Hak Cipta &COPY; {{ date('Y') }} PANTI ASUHAN AL-KHAIRIYAH. ALL RIGHT RESERVED.</small>
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
