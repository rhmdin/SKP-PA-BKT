@if(isset(Auth::user()->email))

@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/tujuan" class="url">
                <h3 class="fw-bolder mb-5 ">Tujuan  &nbsp </h3>
            </a>
            <h3 class="fw-bolder mb-5">/ Tambah</h3>
        </div>

        <div>

            <form action="/tujuan" method="post" onsubmit="return alert('Data berhasil ditambahkan')">

                @csrf
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="isi_tujuan" class="form-label">Keterangan tujuan</label>
                        <input type="text" class="form-control" placeholder="Masukkan tujuan" name="isi_tujuan" value="{{ old('isi_tujuan') }}">
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
