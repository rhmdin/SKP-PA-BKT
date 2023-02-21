@if(isset(Auth::user()->email))
@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Daftar Perjanjian Kinerja</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Sasaran Kinerja</th>
                                <th>Tahun</th>
                                <th>Indikator Kinerja</th>
                                <th>Pihak Pertama</th>
                                <th>Pihak Kedua</th>
                                <th style="width:70px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pk as $iku)
                            @foreach ($iku->detailIku as $item)
                            <tr class="alert">
                                <td class="text-center">{{ $item->id }}</td>
                                <td>{{ $iku->sasaran->isi_sasaran }}</td>
                                <td>{{ $item->tahun}}</td>
                                <td>{{ $iku->isi_iku }}</td>
                                <td>{{ $item->pihak_satu }}</td>
                                <td>{{ $item->pihak_dua }}</td>
                                <td>
                                    <a class="editb" href="/perjanjian-kinerja/{{ $item->id}}"><i class='bx bx-edit' style="color: #e3b200;"></i></a>
                                    </td>

                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
