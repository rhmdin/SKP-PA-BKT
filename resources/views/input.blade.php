@if(isset(Auth::user()->email))
@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex">
            <a href="/indikator-kinerja" class="url">
                <h4 class="fw-bolder mb-5 ">Indikator Kinerja&nbsp</h3>
            </a>
            <h4 class="fw-bolder mb-5">/Input</h4>
        </div>
        <div class="button-add">
            <button class="add1">
                <a
                    @if($jmlinput<2)
                        href="{{ url()->current() }}/tambah"
                    @else
                        onclick="alert('Jumlah input per iku maksimal 2!');"
                    @endif class="">
                    Rambah
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
                                <th>Keterangan Input</th>

                                <th style="width:70px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($inputs as $input)
                            <tr class="alert">
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $input->ket_input }}</td>
                                <td>
                                    <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                    href="{{ url()->current() }}/{{ $input->id }}/destroy"><i class='bx bx-trash' style="color: #A30D11;"></i></a></td>
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
