<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>BERANDA</title>
</head>
<body>
    @include('landing.layouts.header')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        @php
            $jml = count($banner);
        @endphp
        @if($jml == 0)
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/beranda/image.png') }}" class="d-block w-100" alt="panti asuhan" style="height: 500px;">
                    <div class="carousel-caption d-md-block">
                        <h5>Ini contoh</h5>
                        <p>contoh</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('assets/beranda/image2.png') }}" class="d-block w-100" alt="panti asuhan" style="height: 500px;">
                    <div class="carousel-caption d-md-block">
                        <h5>Ini contoh</h5>
                        <p>contoh</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('assets/beranda/image1.png') }}" class="d-block w-100" alt="panti asuhan" style="height: 500px;">
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
                            <img src="{{ asset('uploads/banner/'.$banner[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 500px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $banner[$i]->judul }}</h5>
                                <p>{{ $banner[$i]->deskripsi }}</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/banner/'.$banner[$i]->img.'') }}" class="d-block w-100" alt="panti asuhan" style="height: 500px;">
                            <div class="carousel-caption d-md-block">
                                <h5>{{ $banner[$i]->judul }}</h5>
                                <p>{{ $banner[$i]->deskripsi }}</p>
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

    <div class="container">
        <h2>PANTI ASUHAN AL-KHAIRIYAH</h2>

        {{-- Profile --}}
        <p style="text-align: justify !important">{{ $profile->isi }}</p>
        {{-- @if(isset($profile->img))
            <img src="{{ asset('uploads/profile/'.$profile->img.'') }}" alt="panti asuhan al-khairiyah" width="600" height="300">
        @else
            <img src="{{ asset('assets/beranda/image1.png') }}" alt="panti asuhan al-khairiyah" width="600" height="300">
        @endif --}}

        <iframe width="560" height="315" src="https://www.youtube.com/embed/E04tjqquqi4?si=LYs8RCfRwOqQ9dPm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        {{-- Visi --}}
        <h2>VISI</h2>
        <p style="text-align: justify !important">{{ $visi->isi }}</p>

        {{-- Misi --}}
        @if(count($misi) > 0)
            <h2>MISI</h2>
            @php
                $i = 1;
            @endphp
            @foreach($misi as $misi)
                <p style="text-align: justify !important">
                    {{ $i }}. {{ $misi->isi }}
                </p>
                @php
                    $i++;
                @endphp
            @endforeach
        @endif

        {{-- Tujuan --}}
        @if(count($tujuan) > 0)
            <h2>TUJUAN</h2>
            @php
                $i = 1;
            @endphp
            @foreach($tujuan as $tujuan)
                <p style="text-align: justify !important">
                    {{ $i }}. {{ $tujuan->isi }}
                </p>
                @php
                    $i++;
                @endphp
            @endforeach
        @endif

    </div>

    {{-- Donasi --}}
    @if(count($donasi) > 0)
        <div class="container">
            <h2 class="text">DONASI</h2>
            <div class="row">
                @foreach($donasi as $data)
                    <div class="col-md-6 mb-5">
                        <div class="card">
                            <img src="{{ asset('uploads/donasi/'.$data->img_donasi) }}" class="card-img-top" alt="{{ $data->nama_donasi }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->nama_donasi }}</h5>
                                <p class="card-text">{{ $data->deskripsi_donasi }}</p>
                                <h6>Rp{{ number_format($data->target_donasi, 2, ',', '.') }}</h6>
                                @php
                                    $progress = ($data->terkumpul_donasi / $data->target_donasi) * 100;
                                    $progress_fix = round($progress);
                                @endphp
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $progress_fix }}%;" aria-valuenow="{{ $progress_fix }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ $progress_fix }}%
                                    </div>
                                </div>
                                @if($data->terkumpul_donasi >= $data->target_donasi)
                                    <p class="card-text">Donasi telah terpenuhi</p>
                                @else
                                    <a href="{{ url('/donasi/proses/'.$data->id.'') }}" class="btn btn-primary mt-3" aria-label="Donasi untuk Asrama">DONASI</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


<div class="container mt-5">
<h2>ZAKAT PROFESI</h2>

<p>Gunakan kalkulator ini untuk menghitung zakat profesi Anda. Zakat profesi dihitung sebesar 2.5% dari pendapatan yang telah mencapai nisab.</p>
<p>SEBELUM MELAKUKAN PERHITUNGAN ZAKAT, MOHON CEK SYARAT NISAB TERBARU TERLEBIH DAHULU!</p>

<form id="formZakat">
    <div class="mb-2">
        <label for="pendapatanBulanan" class="form-label">Pendapatan Bulanan (Rp):</label>
        <input type="number" class="form-control" id="pendapatanBulanan" placeholder="masukkan total pendapatan bulanan anda" required>
    </div>

    <div class="mb-2">
        <label for="syaratNisab" class="form-label">Nisab Bulanan (Rp):</label>
        <input type="number" class="form-control" id="syaratNisab" placeholder="mohon isi syarat nisab terbaru" required>
    </div>

    <button type="submit" class="btn btn-success">Hitung Zakat</button>
</form>

<h3 class="mt-3" id="hasilPerhitunganZakat"></h3>
</div>

<script>
document.getElementById('formZakat').addEventListener('submit', function(e) {
    e.preventDefault();

    var pendapatanBulanan = parseFloat(document.getElementById('pendapatanBulanan').value);
    var syaratNisab = parseFloat(document.getElementById('syaratNisab').value);

    if (pendapatanBulanan >= syaratNisab) {
        var hitungZakat = (pendapatanBulanan * 2.5) / 100;
        document.getElementById('hasilPerhitunganZakat').innerHTML = "Zakat profesi yang harus anda bayarkan adalah: Rp " + hitungZakat.toFixed(2);
    } else {
        document.getElementById('hasilPerhitunganZakat').innerHTML = "Penghasilan Anda belum mencapai nisab untuk wajib zakat.";
    }
});
</script>

<br>

    <div class="container">
        <h2 class="text">ALAMAT</h2>

        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0962117427166!2d106.91811607376266!3d-6.117749793868885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a201bd16da507%3A0x53b8635e9dea2f9a!2sPanti%20Asuhan%20Al-khairiyah!5e0!3m2!1sid!2sid!4v1731971429283!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="embed-responsive embed-responsive-1by1" style="align-content: center !important;">
        {{-- <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=FedOM4mvoSA"></iframe> --}}
        {{-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FedOM4mvoSA?si=GsT1piSpR8eee7nT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
    </div>

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
