@if(isset(Auth::user()->email))
@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Pengukuran Kinerja</h3>
        </div>
        <div class="button-add">
            <button class="add1">
                <a href="{{route('tambahPeng')}}" class="">
                    Tambah
                </a>
            </button>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengukuran Kinerja</th>
                                <th>Target</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Input I</th>
                                <th>Input II</th>
                                <th>Realisasi</th>
                                <th>Capaian</th>
                                <th>Sumber Data</th>
                                <th style="width:70px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pengs as $item)
                            <tr class="alert">
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $item->detailIku->iku->isi_iku }}</td>
                                <td>{{ $item->detailIku->target }}</td>
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->detailIku->tahun }}</td>
                                <td>{{ $item->input_satu }}</td>
                                <td>{{ $item->input_dua }}</td>
                                <td>{{ $item->realisasi }}%</td>
                                <td>{{ $item->capaian }}%</td>
                                <td>{{ $item->sumber_data }}</td>
                                <td>
                                    <a class="editb" href="/pengukuran-kinerja/{{ $item->id}}"><i class='bx bx-edit' style="color: #e3b200;"></i></a>
                                    <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                    href="/pengukuran-kinerja/{{$item->id}}/destroy"><i class='bx bx-trash' style="color: #A30D11;"></i></a></td>

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
