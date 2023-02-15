@if(isset(Auth::user()->email))
@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/indikator-kinerja" class="url">
                <h3 class="fw-bolder mb-5 font-weight-normal">Indikator Kinerja &nbsp </h3>
            </a>
            <h3 class="fw-bolder mb-5">/ Edit Indikator Kinerja</h3>
        </div>

        <div>
            <form action="/indikator-kinerja/{{ $data['iku']->id }}" method="post">
                @csrf
                @method('put')
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="id_sasaran" class="form-label">Sasaran :</label>
                        <select name="id_sasaran" class="d-flex form-control minimal">
                            @foreach ($data['sasarans'] as $sasaran)
                            <option value="{{ $sasaran->id }}">{{ $sasaran->isi_sasaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Indikator : </label>
                        <select name="jenis" class="d-flex form-control minimal">
                            <option value="u">utama</option>
                            <option value="p">pendukung</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_iku" class="form-label">Keterangan Indikator : </label>
                        <input type="text" class="form-control" placeholder="Masukkan indikator" name="isi_iku" value="{{ $data['iku']->isi_iku }}">
                    </div>
                    <div class="mb-3">
                        <label for="penanggung_jawab" class="form-label">Penanggung Jawab : </label>
                        <input type="text" class="form-control" placeholder="Masukkan penanggung jawab" name="penanggung_jawab" value="{{ $data['iku']->penanggung_jawab }}">
                    </div>

                    <div class="mb-3">
                        <label for="sumber_data" class="form-label">Sumber Data : </label>
                        <input type="text" class="form-control" placeholder="Masukkan sumber data" name="sumber_data" value="{{ $data['iku']->sumber_data }}">
                    </div>
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
@extends('layouts.sidebar')

