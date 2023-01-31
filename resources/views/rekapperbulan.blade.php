
@if(isset(Auth::user()->email))
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <link rel="stylesheet" href="{{ asset('/css/laporan.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{ asset('/js/exportexcel.js') }}"></script>
    </head>
    <body style="margin:1%; margin-right:10%;">

        <h3 class=" " style="margin-top:1%">Hasil Pengukuran Kinerja per Bulan Tahun 2023</h3>

        <div class="row" style="margin-top:5%">
            <div class="col-md-12">
                        <a href="{{route('laporan')}}" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-dark btn-sm">BACK</button>
                        </a>
                    <button id="exportexcel" type="button" class="btn-outline-success btn btn-sm">EXPORT TO EXCEL</button>
            </div>
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-bordered" id="tahunan"
                                    style="margin-top:2%;background: white;
                                    text-align: center;
                                    vertical-align: middle; font-size:10pt; font-family:'Times New Roman', Times, serif; border-color:black; width:100%;">
                                <thead style="background: white; ">
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3" style="width: 10cm;" >Sasaran Strategis</th>
                                        <th rowspan="3">Indikator Kinerja</th>
                                        <th rowspan="3">Target</th>
                                        <th colspan="48">Realisasi per Bulan</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Januari</th>
                                        <th colspan="3">Februari</th>
                                        <th colspan="3">Maret</th>
                                        <th colspan="3">April</th>
                                        <th colspan="3">Mei</th>
                                        <th colspan="3">Juni</th>
                                        <th colspan="3">Juli</th>
                                        <th colspan="3">Agustus</th>
                                        <th colspan="3">September</th>
                                        <th colspan="3">Oktober</th>
                                        <th colspan="3">November</th>
                                        <th colspan="3">Desember</th>
                                    </tr>
                                    <tr>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                        <th>Input</th>
                                        <th>Realisasi</th>
                                        <th>Capaian</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    <tr>
                                        @foreach ($laporan as $iku)
                                        <tr>
                                            <td>{{ $iku->id }}</td>
                                            <td>{{ $iku->sasaran->tujuan->isi_tujuan }}</td>
                                            <td>{{ $iku->sasaran->isi_sasaran }}</td>
                                            <td>{{ $iku->isi_iku }}</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <script>
                                document.getElementById('exportexcel').addEventListener('click', function(){
                                    var table2excel = new Table2Excel();
                                    table2excel.export(document.querySelectorAll("#tahunan"));

                                });


                            </script>
                        </div>
                    </div>
                </div>
    </body>
</html>

@else

<script>window.location = "/login";</script>
@endif
