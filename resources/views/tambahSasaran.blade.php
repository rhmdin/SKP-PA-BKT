@if(isset(Auth::user()->email))

@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/sasaran-strategis" class="url">
                <h3 class="fw-bolder mb-5 ">Sasaran Strategis  &nbsp </h3>
            </a>
            <h3 class="fw-bolder mb-5">/ Tambah</h3>
        </div>

        <div>

            <form action="/sasaran-strategis" method="post" onsubmit="return alert('Data berhasil ditambahkan')">

                @csrf
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="id_tujuan" class="form-label">Sasaran</label>
                        <select name="id_tujuan" class="d-flex form-control minimal">
                            @foreach ($tujuans as $tujuan)
                            <option value="{{ $tujuan->id }}">{{ $tujuan->isi_tujuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_sasaran" class="form-label">Keterangan sasaran</label>
                        <input type="text" class="form-control" placeholder="Masukkan sasaran" name="isi_sasaran" value="{{ old('isi_sasaran') }}">
                    </div>
                    <div class="mb-3">
                        <label for="periode" class="form-label">Periode </label>
                        <input type="text" class="form-control" placeholder="Masukkan periode sasaran" name="periode" value="{{ old('periode') }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="add1">Tambah</button>
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
