
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
                                <th>Tahun</th>
                                <th>Last Update</th>
                                <th>Lihat Rekapan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="alert">
                                @foreach ($ikus as $iku)
                                <td>{{ $iku->id }}</td>
                                <td>{{ $iku->sasaran->tujuan->isi_tujuan }}</td>
                                <td></td>
                                <td>
                                    <a href="{{route('rekapbulan')}}" style="text-decoration: none;">
                                        <button type="button" class="btn btn-outline-danger btn-sm">Bulan</button>
                                    </a>
                                    <a href="{{route('rekaptriwulan')}}" style="text-decoration: none;">
                                        <button type="button" class="btn btn-outline-warning btn-sm">Triwulan</button>
                                    </a>
                                    <a href="{{route('rekapsemester')}}" style="text-decoration: none;">
                                        <button type="button" class="btn btn-outline-success btn-sm">Semester</button>
                                    </a>
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
