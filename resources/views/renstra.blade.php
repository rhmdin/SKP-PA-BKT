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
                                <th>Sasaran Kinerja</th>
                                <th>Indikator Kinerja</th>
                                <th>Periode</th>
                                <th>Tahun I</th>
                                <th>Tahun II</th>
                                <th>Tahun III</th>
                                <th>Tahun IV</th>
                                <th>Tahun V</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr class="alert">
                                @foreach ($renstra as $iku)
                                <td>{{ $iku->id }}</td>
                                <td>{{ $iku->sasaran->isi_sasaran }}</td>
                                <td>{{ $iku->isi_iku }}</td>
                                <td>{{ $iku->sasaran->periode }}</td>
                                @php
                                    $periode = explode('-', $iku->sasaran->periode); 
                                @endphp
                                @foreach ($iku->detailIku->where('tahun', '>=', (int)$periode[0])->where('tahun', '<=', (int)$periode[1]) as $object)
                                <td>{{ $object->target }}</td>
                                @endforeach
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