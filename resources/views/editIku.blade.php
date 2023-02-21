@if(isset(Auth::user()->email))
@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/indikator-kinerja" class="url">
                <h4 class="fw-bolder mb-5">Indikator Kinerja &nbsp</h4>
            </a>
            <h4 class="fw-bolder mb-5">/Edit</h4>
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
                            <option value="{{ $sasaran->id }}" @if($sasaran->id == $data['iku']->id_sasaran) selected @endif>{{ $sasaran->isi_sasaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Indikator : </label>
                        <select name="jenis" class="d-flex form-control minimal">
                            <option value="u" @if($data['iku']->jenis == 'u') selected @endif>utama</option>
                            <option value="p"@if($data['iku']->jenis == 'p') selected @endif>pendukung</option>
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

