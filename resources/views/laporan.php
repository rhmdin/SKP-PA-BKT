
@if(isset(Auth::user()->email))
@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Daftar Indikator Kinerja</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                        <h3 class="jenis">I. Indikator Utama</h3>
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Tujuan Strategis</th>
                                <th>Sasaran Kinerja</th>
                                <th>Periode</th>
                                <th>Indikator Kinerja</th>
                                <th>Penanggung Jawab</th>
                                <th>Target</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="alert">
                                @foreach ($ikus as $iku)
                                <td>{{ $iku->id }}</td>
                                <td>{{ $iku->sasaran->tujuan->isi_tujuan }}</td>
                                <td>{{ $iku->sasaran->isi_sasaran }}</td>
                                <td>{{ $iku->sasaran->periode }}</td>
                                <td>{{ $iku->isi_iku }}</td>
                                <td>{{ $iku->penanggung_jawab }}</td>
                                <td>{{ $iku->target }}</td>
                                <td>
                                    <a class="editb" href=""><i class='bx bx-detail' style="color: #0026be;"></i></a>
                                    <a class="editb" href=""><i class='bx bx-edit' style="color: #e3b200;"></i></a>
                                    <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                    href=""><i class='bx bx-trash' style="color: #A30D11;"></i></a></td>
                                    @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@else

<script>window.location = "/login";</script>
@endif
