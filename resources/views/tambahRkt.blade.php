@if(isset(Auth::user()->email))

@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/rencana-kinerja-tahunan" class="url">
                <h4 class="fw-bolder mb-5">Rencana Kinerja Tahunan &nbsp</h4>
            </a>
            <h4 class="fw-bolder mb-5">/Tambah</h4>
        </div>

        <div>

            <form action="/rencana-kinerja-tahunan/tambah" method="post" onsubmit="return alert('Data berhasil ditambahkan')">

                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="id_iku" class="form-label">Indikator Kinerja</label>
                            <select name="id_iku" class="d-flex form-control minimal" required>
                                @foreach ($ikus as $iku )
                                <option value="{{ $iku->id }}">{{ $iku->isi_iku }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" placeholder="Masukkan tahun" name="tahun" value="{{ old('tahun') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="target" class="form-label">Target (%)</label>
                            <input type="text" class="form-control" placeholder="Masukkan target" name="target" value="{{ old('target') }}" required>
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
