@if(isset(Auth::user()->email))

@extends('layouts.sidebar')
@section('content')
<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Daftar Laporan Rekapitulasi Pengukuran</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl table-hover table-bordered" id="table_id"  >
                        <thead style="background: rgba(255, 255, 255, 0.856);">
                            <tr>
                                <th style="width:30px;">No </th>
                                <th >Tahun</th>
                                <th >Last Update</th>
                                <th >Keterangan</th>
                                <th style="width:250px;">Lihat Rekapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>
                            @foreach ($detailiku as $lap)

                            <tr class="alert">
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $lap->tahun}}</td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td>
                                    <?php $tahun = $lap->tahun?>
                                    <button type="button" class="btn btn-outline-danger btn-md" onClick="window.open('{{route('rekapbulan', $tahun)}}');">Bulan</button>
                                    <button type="button" class="btn btn-outline-warning btn-md" onClick="window.open('{{route('rekaptriwulan', $tahun)}}');">Triwulan</button>
                                    <button type="button" class="btn btn-outline-success btn-md" onClick="window.open('{{route('rekapsemester', $tahun)}}');">Semester</button>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>       
@endsection


<script>
    $(document).ready(function(){
         $('#employee_data').DataTable();
    });
    </script>
@else

<script>
    window.location = "/login";
    confirm("Harap Login Dahulu!");
</script>
@endif
