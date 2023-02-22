@if(isset(Auth::user()->email))
@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/sasaran-strategis" class="url">
                <h4 class="fw-bolder mb-5">Sasaran Strategis &nbsp</h4>
            </a>
            <h4 class="fw-bolder mb-5">/Edit</h4>
        </div>

        <div>
            <form action="/sasaran-strategis/{{ $data['sasaran']->id }}" method="post">
                @csrf
                @method('put')
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="id_tujuan" class="form-label">Tujuan :</label>
                        <select name="id_tujuan" class="d-flex form-control minimal">
                            @foreach ($data['tujuans'] as $tujuan)
                            <option value="{{ $tujuan->id }}" @if($tujuan->id == $data['sasaran']->id_tujuan) selected @endif>{{ $tujuan->isi_tujuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_sasaran" class="form-label">Keterangan Sasaran : </label>
                        <input type="text" class="form-control" placeholder="Masukkan sasaran" name="isi_sasaran" value="{{ $data['sasaran']->isi_sasaran }}">
                    </div>
                    <div class="mb-3">
                        <label for="periode" class="form-label">Periode : </label>
                        <input type="text" class="form-control" placeholder="Masukkan periode sasaran" name="periode" value="{{ $data['sasaran']->periode }}">
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

