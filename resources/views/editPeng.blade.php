@if(isset(Auth::user()->email))

@extends('layouts.sidebar')
@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/pengukuran-kinerja" class="url">
                <h3 class="fw-bolder mb-5 font-weight-normal">Pengukuran Kinerja &nbsp </h3>
            </a>
            <h3 class="fw-bolder mb-5">/ Edit Pengukuran Kinerja</h3>
        </div>

        <div>
            <form action="/pengukuran-kinerja/{{ $data['peng']->id }}" method="post">
                @csrf
                @method('put')
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="id_detail" class="form-label">Indikator</label>
                        <select name="id_detail" class="d-flex form-control minimal">
                            @foreach ($data['iku'] as $iku)
                            <option value="{{ $iku->id }}" @if($iku->id == $data['peng']->id_detail) selected @endif>{{ $iku->tahun }} ; {{ $iku->iku->isi_iku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select name="bulan" class="d-flex form-control minimal">
                            <option value="Januari" @if($data['peng']->bulan == 'Januari') selected @endif>Januari</option>
                            <option value="Februari"@if($data['peng']->bulan == 'Februari') selected @endif>Februari</option>
                            <option value="Maret"@if($data['peng']->bulan == 'Maret') selected @endif>Maret</option>
                            <option value="April"@if($data['peng']->bulan == 'April') selected @endif>April</option>
                            <option value="Mei"@if($data['peng']->bulan == 'Mei') selected @endif>Mei</option>
                            <option value="Juni"@if($data['peng']->bulan == 'Juni') selected @endif>Juni</option>
                            <option value="Juli"@if($data['peng']->bulan == 'Juli') selected @endif>Juli</option>
                            <option value="Agustus"@if($data['peng']->bulan == 'Agustus') selected @endif>Agustus</option>
                            <option value="September"@if($data['peng']->bulan == 'September') selected @endif>September</option>
                            <option value="Oktober"@if($data['peng']->bulan == 'Oktober') selected @endif>Oktober</option>
                            <option value="November"@if($data['peng']->bulan == 'November') selected @endif>November</option>
                            <option value="Desember"@if($data['peng']->bulan == 'Desember') selected @endif>Desember</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input_satu" class="form-label">Input 1</label>
                        <input type="number" class="form-control" placeholder="Masukkan pembilang" name="input_satu" value="{{ $data['peng']->input_satu }}">
                    </div>
                    <div class="mb-3">
                        <label for="input_dua" class="form-label">Input 2</label>
                        <input type="number" class="form-control" placeholder="Masukkan penyebut" name="input_dua" value="{{ $data['peng']->input_dua }}">
                    </div>

                    <div class="mb-3">
                        <label for="sumber_data" class="form-label">Sumber Data </label>
                        <input type="text" class="form-control" placeholder="Masukkan link sumber data" name="sumber_data" value="{{ $data['peng']->sumber_data }}">
                    </div>

                    <input type="text" class="form-control" placeholder="Masukkan link sumber data" name="realisasi" hidden>
                    <input type="text" class="form-control" placeholder="Masukkan link sumber data" name="capaian" hidden>

                    <div class="mb-3">
                        <button type="submit" class="add1">Simpan</button>
                    </div>
                </div>

            </form>
        </div>



    </div>
</section>
@endsection
@else

<script>
    window.location = "/login";
    confirm("Harap Login Dahulu!");
</script>
@endif
