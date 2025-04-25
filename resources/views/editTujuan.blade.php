@if(isset(Auth::user()->email))
@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/tujuan" class="url">
                <h4 class="fw-bolder mb-5">Tujuan &nbsp</h4>
            </a>
            <h4 class="fw-bolder mb-5">/Edit</h4>
        </div>

        <div>
            <form action="/tujuan/{{ $data['tujuan']->id }}" method="post">
                @csrf
                @method('put')
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="isi_tujuan" class="form-label">Keterangan Tujuan : </label>
                        <input type="text" class="form-control" placeholder="Masukkan tujuan" name="isi_tujuan" value="{{ $data['tujuan']->isi_tujuan }}">
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

