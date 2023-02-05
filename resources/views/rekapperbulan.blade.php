<?php
    use App\Models\InputIku;
    use App\Models\Pengukuran;
?>
@if(isset(Auth::user()->email))
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap PerBulan</title>
    <link rel="stylesheet" href="{{ asset('/css/laporan.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{ asset('/js/exportexcel.js') }}"></script>
    </head>
    <body style="margin:1%; margin-right:10%;">

        <h3 class=" " style="margin-top:1%">Hasil Pengukuran Kinerja per Bulan Tahun {{ $tahun }}</h3>

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
                                        <th rowspan="3">Keterangan Input</th>
                                        <th colspan="<?php echo 3 * $jmlbln ?>">Realisasi per Bulan</th>
                                    </tr>
                                    <tr>
                                        @foreach ($ukur as $bulan)
                                        <th colspan="3">{{ $bulan->bulan }}</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($ukur as $bulan)
                                        <th>Input</th>
                                        <th rowspan="2">Realisasi</th>
                                        <th rowspan="2">Capaian</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    <?php
                                        $no=1;
                                    ?>
                                    @foreach ($detailiku as $detiku)
                                    <tr>
                                        <tr>
                                            <td rowspan="2">{{ $no }}</td>
                                            <td rowspan="2">{{ $detiku->iku->sasaran->isi_sasaran }}</td>
                                            <td rowspan="2">{{ $detiku->iku->isi_iku }}</td>
                                            <td rowspan="2">{{ $detiku->iku->target }}%</td>
                                            <?php
                                                $id_iku = $detiku->id_iku;
                                                $input = InputIku::where('id_iku', $id_iku)->get();
                                            ?>
                                            <td>{{ $input[0]->ket_input }}</td>
                                            @foreach($ukur as $ukur)
                                                <td>{{ $ukur->input_satu }}</td>
                                                <td rowspan="2">{{ $ukur->realisasi }}</td>
                                                <td rowspan="2">{{ $ukur->capaian }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>{{ $input[1]->ket_input }}</td>
                                            @foreach($ukur2 as $ukur2)
                                                <td>{{ $ukur2->input_dua }}</td>
                                            @endforeach
                                        </tr>
                                    </tr>
                                    <?php $no++ ?>
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

<script>
    window.location = "/login";
    confirm("Harap Login Dahulu!");
</script>
@endif
