
@if(isset(Auth::user()->email))

<!DOCTYPE html>
<html>
     <head>
          <title>Laporan</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
     </head>
     <body>

        @extends('layouts.sidebar')

        @section('content')
        <section class="main-panel">
            <div class="container">
                <div class="section-title"  style="margin-top: 1%; margin-bottom:4%;">
                    <h1 class="fw-bolder mb-4">Daftar Laporan Rekapitulasi Pengukuran</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-responsive-xl table-hover table-bordered" id="employee_data"  >
                                <thead style="background: rgba(255, 255, 255, 0.856);">
                                    <tr>
                                        <th>No </th>
                                        <th style="width: 80px; min-width:10px;">Tahun</th>
                                        <th style="min-width: 100px; width:150px;">Last Update</th>
                                        <th style="min-width: 100px; width:240px;">Keterangan</th>
                                        <th style="min-width: 100px; width:220px;">Lihat Rekapan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1 ?>
                                    
                                    @foreach ($detailiku as $lap)

                                    <tr class="alert">
                                        <td>{{ $no=1 }}</td>
                                        <td>{{ $lap->tahun}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php $tahun = $lap->tahun?>
                                            <button type="button" class="btn btn-outline-danger btn-lg" onClick="window.open('{{route('rekapbulan', $tahun)}}');">Bulan</button>
                                            <button type="button" class="btn btn-outline-warning btn-lg" onClick="window.open('{{route('rekaptriwulan', $tahun)}}');">Triwulan</button>
                                            <button type="button" class="btn btn-outline-success btn-lg" onClick="window.open('{{route('rekapsemester', $tahun)}}');">Semester</button>
                                        <?php $no++ ?>
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
     </body>
</html>

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
