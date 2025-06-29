<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='{{ asset('assets/logo.jpg') }}' rel="shortcut icon">
    <title>DONASI - {{ $donasi->nama_donasi }}</title>
    {{-- jQuery Confirm --}}
    <link href="{{ asset('assets/donasi/jquery-confirm/jquery-confirm.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    @include('landing.layouts.header')

    <div class="container center">
        <div class="p--2 border--rounded bg-success text-light">
            <form class="row g-3" name="form_donasi" id="form_donasi" action="javascript:submit_donasi()">
                <input type="hidden" required readonly value="{{ $donasi->id }}" name="id_donasi" id="id_donasi" />
                <div class="col-md-6">
                    <label for="inputNamadepan" class="form-label">Nama Depan</label>
                    <input type="text" required class="form-control" name="nama_depan" id="inputNamadepan">
                </div>
                <div class="col-md-6">
                    <label for="inputNamabelakang" class="form-label">Nama Belakang</label>
                    <input type="text" required class="form-control" name="nama_belakang" id="inputNamabelakang">
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" required class="form-control" name="email" id="inputEmail">
                </div>
                <div class="col-12">
                    <label for="inputTelepon" class="form-label">Telepon</label>
                    <input type="number" required class="form-control" name="telepon" id="inputTelepon">
                </div>
                <div class="col-12">
                    <label for="inputNominal" class="form-label">Nominal</label>
                    <input type="text" required onkeydown="formatnumber()" class="form-control" id="formattedNominal">
                    <input type="hidden" required class="form-control" name="nominal" id="inputNominal">
                </div>
                <div class="col-12">
                    <input type="radio" onclick="document.getElementById('formattedNominal').value = `10.000`; document.getElementById('inputNominal').value = 10000" id="10rb" name="nominal_select" value="10000">
                    <label for="10rb">Rp10.000</label><br>
                    <input type="radio" onclick="document.getElementById('formattedNominal').value = `20.000`; document.getElementById('inputNominal').value = 20000" id="20rb" name="nominal_select" value="20000">
                    <label for="20rb">Rp20.000</label><br>
                    <input type="radio" onclick="document.getElementById('formattedNominal').value = `50.000`; document.getElementById('inputNominal').value = 50000" id="50rb" name="nominal_select" value="50000">
                    <label for="50rb">Rp50.000</label>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">DONASI</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- Block UI --}}
    <script src="{{ asset('assets/donasi/blockui/jquery.blockUI.js') }}"></script>
    {{-- jQuery Confirm --}}
    <script src="{{ asset('assets/donasi/jquery-confirm/jquery-confirm.js') }}"></script>
    @include('landing.donasi.javascript')
</body>
</html>

