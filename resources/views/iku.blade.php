@if(isset(Auth::user()->email))
@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Daftar Indikator Kinerja</h3>
        </div>
        <div class="button-add">
            <button class="add1">
                <a href="{{route('tambahIku')}}" class="">
                    Tambah
                </a>
            </button>
        </div>
        <h3 class="jenis">I. Indikator Utama</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Tujuan Strategis</th>
                                <th>Sasaran Kinerja</th>
                                <th>Periode</th>
                                <th>Indikator Kinerja</th>
                                <th>Jenis</th>
                                <th>Penanggung Jawab</th>
                                <th style="width:100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            $no1 = 1;
                        @endphp
                            @foreach ($ikus as $iku)


                            <tr class="alert">
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $iku->sasaran->tujuan->isi_tujuan }}</td>
                                <td>{{ $iku->sasaran->isi_sasaran }}</td>
                                <td>{{ $iku->sasaran->periode }}</td>
                                <td>{{ $iku->isi_iku }}</td>
                                <td>{{ $iku->jenis }}</td>
                                <td>{{ $iku->penanggung_jawab }}</td>
                                <td>
                                    <a class="editb" href="/input-indikator/{{ $iku->id}}"><i class='bx bx-detail' style="color: #0026be;"></i></a>
                                    <a class="editb" href="/indikator-kinerja/{{ $iku->id}}"><i class='bx bx-edit' style="color: #e3b200;"></i></a>
                                    <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                    href="/indikator-kinerja/{{$iku->id}}/destroy"><i class='bx bx-trash' style="color: #A30D11;"></i></a></td>
                            </tr>
                        
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
