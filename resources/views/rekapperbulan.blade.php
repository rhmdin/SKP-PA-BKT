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
    <body style="margin:1%;">

        <h3 class=" " style="margin-top:1%">Hasil Pengukuran Kinerja Akumulatif per Bulan Tahun {{ $tahun }}</h3>
        <h3 class="mt-4" >I. Akumulatif</h3>

        <div class="row mt-3" >
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
                            <table class="table table-bordered" id="akumulatif"
                                    style="margin-top:2%;background: white;
                                    text-align: center;
                                    vertical-align: middle; font-size:10pt; font-family:'Times New Roman', Times, serif; border-color:black; width:100%;">
                                <thead style="background: white; ">
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3" style="width: 10cm;" >Sasaran Strategis</th>
                                        <th rowspan="3">Indikator Kinerja</th>
                                        <th rowspan="3">Jenis</th>
                                        <th rowspan="3">Target (%)</th>
                                        <th rowspan="3">Keterangan Input</th>
                                        <th colspan="36">Realisasi Akumulatif per Bulan Tahun {{ $tahun }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Januari</th>
                                        <th colspan="3">Februari (Jan-Feb)</th>
                                        <th colspan="3">Maret (Jan-Mar)</th>
                                        <th colspan="3">April (Jan-Apr)</th>
                                        <th colspan="3">Mei (Jan-Mei)</th>
                                        <th colspan="3">Juni (Jan-Jun)</th>
                                        <th colspan="3">Juli (Jan-Jul)</th>
                                        <th colspan="3">Agustus (Jan-Ags)</th>
                                        <th colspan="3">September (Jan-Sep)</th>
                                        <th colspan="3">Oktober (Jan-Okt)</th>
                                        <th colspan="3">November (Jan-Nov)</th>
                                        <th colspan="3">Desember (Jan-Des)</th>
                                    </tr>
                                    <tr>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">

                                    @if ($jml_dtl > 0 )
                                        <?php
                                            $no = 0;
                                        ?>
                                        @foreach ($detail as $detailiku)
                                            <tr>
                                                @if($detailiku->iku->jenis==="u")
                                                    @php
                                                    $jenis = "umum";
                                                    @endphp
                                                @elseif($detailiku->iku->jenis==="p")
                                                    @php
                                                    $jenis = "pendukung";
                                                    @endphp
                                                @else
                                                    @php
                                                    $jenis = " - ";
                                                    @endphp
                                                @endif
                                                @php
                                                 $no++;
                                                @endphp
                                                <td rowspan="2">{{ $no }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->sasaran->isi_sasaran }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->isi_iku }}</td>
                                                <td rowspan="2">{{ $jenis }}</td>
                                                <td rowspan="2">{{ $detailiku->target }}</td>
                                                @if (count($detailiku->iku->inputIku) != 0)
                                                    @foreach ($detailiku->iku->inputIku as $index => $item)
                                                    @if($index == 0)
                                                    <td>{{ $item->ket_input }}</td>
                                                    @else
                                                    @endif
                                                    @endforeach
                                                @else
                                                <td>belum ditambahkan</td>
                                                @endif
                                                @php
                                                    $jml_ukur = Pengukuran::where('id_detail', $detailiku->id)->count();
                                                    $ukur = Pengukuran::where('id_detail', $detailiku->id)->get();
                                                @endphp
                                                @if ($jml_ukur>0)
                                                    @php
                                                        $bulan = 0;
                                                        $jmlinput1=0;
                                                        $jmlreal=0;
                                                        $jmlcapai=0;
                                                        $rata2real=0;
                                                        $rata2capai=0;
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                            @php
                                                                $bulan++;
                                                                $jmlinput1 = round($jmlinput1 + $ukur->input_satu,2);
                                                                $jmlreal = round($jmlreal + $ukur->realisasi,2);
                                                                $jmlcapai = round($jmlcapai + $ukur->capaian,2);

                                                                $rata2real = round($jmlreal/$bulan,2);
                                                                $rata2capai = round($jmlcapai/$bulan,2);
                                                            @endphp
                                                                <td>{{ $jmlinput1 }}</td>
                                                                <td rowspan="2">{{ $rata2real }}</td>
                                                                <td rowspan="2">{{ $rata2capai }}</td>
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
                                                    @for ($i = 12; $i > 0; $i--)
                                                    <td> - </td>
                                                    <td rowspan="2"> - </td>
                                                    <td rowspan="2"> - </td>
                                                    @endfor
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (count($detailiku->iku->inputIku) != 0)
                                            @foreach ($detailiku->iku->inputIku as $index => $item)
                                            @if($index == 1)
                                            <td>{{ $item->ket_input }}</td>
                                            @else
                                            @endif
                                            @endforeach
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
                                                                $rata2input2 = round((($rata2input2 + $ukur->input_dua)),2);
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
                                    table2excel.export(document.querySelectorAll("#akumulatif"));

                                });
                            </script>
                        </div>
                    </div>
                </div>

        <h3 class="mt-4" >II. Parsial</h3>
        <div class="row" style="margin-top:2%">
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
                            <table class="table table-bordered" id="parsial"
                                    style="margin-top:2%;background: white;
                                    text-align: center;
                                    vertical-align: middle; font-size:10pt; font-family:'Times New Roman', Times, serif; border-color:black; width:100%;">
                                <thead style="background: white; ">
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3" style="width: 10cm;" >Sasaran Strategis</th>
                                        <th rowspan="3">Indikator Kinerja</th>
                                        <th rowspan="3">Jenis</th>
                                        <th rowspan="3">Target (%)</th>
                                        <th rowspan="3">Keterangan Input</th>
                                        <th colspan="36">Realisasi Parsial per Bulan Tahun {{ $tahun }}</th>
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
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    @if ($jml_dtl > 0 )
                                    <?php
                                        $no = 0;
                                    ?>
                                        @foreach ($detail as $detailiku)
                                            <tr>
                                                @if($detailiku->iku->jenis==="u")
                                                    @php
                                                    $jenis = "umum";
                                                    @endphp
                                                @elseif($detailiku->iku->jenis==="p")
                                                    @php
                                                    $jenis = "pendukung";
                                                    @endphp
                                                @else
                                                    @php
                                                    $jenis = " - ";
                                                    @endphp
                                                @endif
                                                @php
                                                $no++;
                                                @endphp
                                                <td rowspan="2">{{ $no }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->sasaran->isi_sasaran }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->isi_iku }}</td>
                                                <td rowspan="2">{{ $jenis }}</td>
                                                <td rowspan="2">{{ $detailiku->target }}</td>
                                                @if (count($detailiku->iku->inputIku) != 0)
                                            @foreach ($detailiku->iku->inputIku as $index => $item)
                                            @if($index == 0)
                                            <td>{{ $item->ket_input }}</td>
                                            @else
                                            @endif
                                            @endforeach
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
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                            @php
                                                                $bulan++;
                                                                $input1 = round($ukur->input_satu,2);
                                                                $real = round($ukur->realisasi,2);
                                                                $capai = round($ukur->capaian,2);
                                                            @endphp
                                                                <td>{{ $input1 }}</td>
                                                                <td rowspan="2">{{ $real }}</td>
                                                                <td rowspan="2">{{ $capai }}</td>
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
                                                    @for ($i = 12; $i > 0; $i--)
                                                    <td> - </td>
                                                    <td rowspan="2"> - </td>
                                                    <td rowspan="2"> - </td>
                                                    @endfor
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (count($detailiku->iku->inputIku) != 0)
                                            @foreach ($detailiku->iku->inputIku as $index => $item)
                                            @if($index == 1)
                                            <td>{{ $item->ket_input }}</td>
                                            @else
                                            @endif
                                            @endforeach
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
                                                                $input2 = round($ukur->input_dua,2);
                                                                $bulan++;
                                                            @endphp
                                                                <td>{{ $input2 }}</td>
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
                                    table2excel.export(document.querySelectorAll("#parsial"));

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
