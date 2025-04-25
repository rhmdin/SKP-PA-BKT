@if(isset(Auth::user()->email))
@extends('layouts.sidebar')

@section('content')
<section class="main-panel">
    @if ($message = Session::get('successdelete'))
         <script>
          alert("Tujuan berhasil dihapus");
        </script>
    @endif
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Daftar Tujuan</h3>
        </div>
        <div class="button-add">
            <button class="add1">
                <a href="{{route('tambahTujuan')}}" class="">
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
                                <th>No </th>
                                <th>Tujuan</th>
                                <th style="width:100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                           
                        @endphp
                            @foreach ($tujuans as $tujuan)
                            <tr class="alert">
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $tujuan->isi_tujuan }}</td>
                                <td>
                                    <a class="editb" href="/tujuan/{{ $tujuan->id }}">
                                        <i class='bx bx-edit' style="color: #e3b200;"></i>
                                    </a>
                            
                                    @if ($tujuan->is_deletable)
                                        <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                           href="/tujuan/{{ $tujuan->id }}/destroy">
                                            <i class='bx bx-trash' style="color: #A30D11;"></i>
                                        </a>
                                    @endif
                                </td>
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
