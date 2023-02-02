@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/perjanjian-kinerja" class="url">
                <h3 class="fw-bolder mb-5 font-weight-normal">Perjanjian Kinerja &nbsp </h3>
            </a>
            <h3 class="fw-bolder mb-5">/ Edit Perjanjian Kinerja</h3>
        </div>
        
        <div>
            
            <form action="/perjanjian-kinerja/{{ $data['pk']->id }}" method="post" onsubmit="return alert('Data berhasil diedit')">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="id_iku" class="form-label">Indikator Kinerja</label>
                            <input type="text" class="form-control" placeholder="Masukkan target" name="target" value="{{ $data['iku']->isi_iku}}" readonly>

                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" placeholder="Masukkan tahun" name="tahun" value="{{ $data['pk']->tahun}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="target" class="form-label">Target (%)</label> 
                            <input type="text" class="form-control" placeholder="Masukkan target" name="target" value="{{ $data['pk']->target}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="pihak_satu" class="form-label">Pihak pertama</label> 
                            <input type="text" class="form-control" placeholder="Masukkan pihak pertama" name="pihak_satu" value="{{ $data['pk']->pihak_satu}}">
                        </div>
                        <div class="mb-3">
                            <label for="pihak_dua" class="form-label">Pihak Kedua </label> 
                            <input type="text" class="form-control" placeholder="Masukkan pihak kedua" name="pihak_dua" value="{{ $data['pk']->pihak_dua}}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_ditetapkan" class="form-label">Tanggal ditetapkan </label> 
                            <input type="date" class="form-control" placeholder="Masukkan pihak kedua" name="tanggal_ditetapkan" value="{{ $data['pk']->tanggal_ditetapkan}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="add1">Simpan</button>
                        </div>
                    </div>

                </div>

            
            </form>
        </div>
        
            
       
    </div>
</section>
@endsection