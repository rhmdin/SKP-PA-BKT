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

        <h3 class=" " style="margin-top:1%">Hasil Pengukuran Kinerja Akumulatif per Bulan Tahun {{ $tahun }}</h3>

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
                            <br>
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
                                        <th colspan="36">Realisasi Akumulatif per Bulan</th>
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
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi</th>
                                            <th rowspan="2">Capaian</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    <?php
                                        $no = 1;
                                    ?>
                                    @if ($jml_dtl > 0 )
                                        @foreach ($detail as $detailiku)
                                            <tr>
                                                <td rowspan="2">{{ $detailiku->iku->id }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->sasaran->isi_sasaran }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->isi_iku }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->target }}%</td>
                                                @php
                                                    $jml_ipt = InputIku::where('id_iku', $detailiku->iku->id)->count();
                                                    $input = InputIku::where('id_iku', $detailiku->iku->id)->get();
                                                @endphp
                                                @if ($jml_ipt>0)
                                                    <td>{{ $input[0]->ket_input }}</td>
                                                @else
                                                    <td> belum ditambahkan </td>
                                                @endif
                                                @php
                                                    $jml_ukur = Pengukuran::where('id_detail', $detailiku->id)->count();
                                                    $ukur = Pengukuran::where('id_detail', $detailiku->id)->get();
                                                @endphp
                                                @if ($jml_ukur>0)
                                                    @php
                                                        $bulan = 1;
                                                        $rata2input1=0;
                                                        $rata2real=0;
                                                        $rata2capai=0;
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                            @php
                                                                $rata2input1 = (($rata2input1 + $ukur->input_satu) / ($bulan));
                                                                $rata2real = (($rata2real + $ukur->realisasi) / ($bulan));
                                                                $rata2capai = (($rata2capai + $ukur->capaian) / ($bulan));
                                                                $bulan++;
                                                            @endphp
                                                                <td>{{ $rata2input1 }}</td>
                                                                <td rowspan="2">{{ $rata2real }}%</td>
                                                                <td rowspan="2">{{ $rata2capai }}%</td>
                                                    @endforeach
                                                    @php
                                                        $sisabln = 12 - $bulan;
                                                    @endphp
                                                    @if($sisabln > 0){
                                                        @for ($i = $sisabln; $i >= 0; $i--)
                                                            <td> - </td>
                                                            <td rowspan="2"> - </td>
                                                            <td rowspan="2"> - </td>
                                                        @endfor
                                                    }
                                                    @endif
                                                @else
                                                    <td>-</td>
                                                    <td rowspan="2">-</td>
                                                    <td rowspan="2">-</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($jml_ipt>0)
                                                    <td>{{ $input[1]->ket_input }}</td>
                                                @else
                                                    <td>belum ditambahkan</td>
                                                @endif
                                                @php
                                                    $jml_ukur = Pengukuran::where('id_detail', $detailiku->id)->count();
                                                    $ukur = Pengukuran::where('id_detail', $detailiku->id)->get();
                                                @endphp
                                                @if ($jml_ukur>0)
                                                    @php
                                                    $bulan = 1;
                                                    $rata2input2=0;
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                            @php
                                                                $rata2input2 = (($rata2input2 + $ukur->input_dua) / ($bulan));
                                                                $bulan++;
                                                            @endphp
                                                                <td>{{ $rata2input2 }}</td>
                                                    @endforeach
                                                @else
                                                    <td> - </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="51"> Tidak ada data</td>
                                        </tr>
                                    @endif
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
