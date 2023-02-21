@if(isset(Auth::user()->email))

@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/indikator-kinerja" class="url">
                <h4 class="fw-bolder mb-5 ">Indikator Kinerja&nbsp</h3>
            </a>
            <a href="{{ url()->previous() }}" class="url">
                <h4 class="fw-bolder mb-5">/Input&nbsp</h3>
            </a>
            <h4 class="fw-bolder mb-5">/Tambah</h3>
        </div>

        <div>

            <form action="{{ url()->previous() }}" method="post" onsubmit="return alert('Data berhasil ditambahkan')">

                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="mb-3">
                            <label for="tahun" class="form-label">Keterangan Input</label>
                            <input type="text" class="form-control" placeholder="Masukkan keterangan input" name="ket_input" value="{{ old('ket_input') }}" required>
                        </div>


                        <div class="mb-3">
                            <button type="submit" class="add1">Tambah</button>
                        </div>
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
