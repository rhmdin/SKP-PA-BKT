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
                            <option value="{{ $iku->id }}">{{ $iku->tahun }} ; {{ $iku->iku->isi_iku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select name="bulan" class="d-flex form-control minimal">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>

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
