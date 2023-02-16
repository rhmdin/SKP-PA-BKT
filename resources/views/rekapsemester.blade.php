@php
use App\Models\InputIku;
use App\Models\Pengukuran;
@endphp
@if(isset(Auth::user()->email))
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap Semester</title>
    <link rel="stylesheet" href="{{ asset('/css/laporan.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{ asset('/js/exportexcel.js') }}"></script>
    </head>
    <body style="margin:1%; ">

        <h3 class=" " style="margin-top:1%">Hasil Pengukuran Kinerja per Semester Tahun 2023</h3>
        <h3 class="mt-4" >I. Akumulatif</h3>
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
                            <table class="table table-bordered" id="akumulatif"
                                    style="margin-top:2%;background: white;
                                    text-align: center;
                                    vertical-align: middle; font-size:10pt; font-family:'Times New Roman', Times, serif; border-color:black; width:100%;">
                                <thead style="background: white; ">
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3" style="width:35%;" >Sasaran Strategis</th>
                                        <th rowspan="3" style="width:35%;">Indikator Kinerja</th>
                                        <th rowspan="3">Jenis</th>
                                        <th rowspan="3">Target (%)</th>
                                        <th rowspan="3" style="width:50%;">Keterangan Input</th>
                                        <th colspan="6">Realisasi Akumulatif per Semester Tahun {{ $tahun }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="width:20%;">Semester I (Januari-Juni)</th>
                                        <th colspan="3" style="width:20%;">Semester II (Januari-Desember)</th>
                                    </tr>
                                    <tr>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    <?php
                                        $no = 1;
                                    ?>
                                    @if ($jml_dtl > 0 )
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
                                                <td rowspan="2">{{ $detailiku->iku->id }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->sasaran->isi_sasaran }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->isi_iku }}</td>
                                                <td rowspan="2">{{ $jenis }}</td>
                                                <td rowspan="2">{{ $detailiku->target }}</td>
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
                                                        $bulan1 = 0;
                                                        $jmlinput11=0;
                                                        $jmlreal1=0;
                                                        $jmlcapai1=0;
                                                        $bulan2 = 1;
                                                        $jmlinput12 = round(Pengukuran::where('id_detail', $detailiku->id)->sum('input_satu'),2);
                                                        $real2 = round(Pengukuran::where('id_detail', $detailiku->id)->avg('realisasi'),2);
                                                        $capai2 = round(Pengukuran::where('id_detail', $detailiku->id)->avg('capaian'),2);
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                        @php
                                                            $bulan2++;
                                                        @endphp
                                                            @if($ukur->bulan==="Januari"||$ukur->bulan==="Februari"||$ukur->bulan==="Maret"||$ukur->bulan==="April"||$ukur->bulan==="Mei"||$ukur->bulan==="Juni")
                                                            @php
                                                                $bulan1++;
                                                                $jmlinput11 = round((($jmlinput11 + $ukur->input_satu)),2);
                                                                $jmlreal1 = round((($jmlreal1 + $ukur->realisasi)),2);
                                                                $jmlcapai1 = round((($jmlcapai1 + $ukur->capaian)),2);
                                                            @endphp
                                                            @endif
                                                    @endforeach
                                                    <td>{{ $jmlinput11 }}</td>
                                                    <td rowspan="2">{{round($jmlreal1/$bulan1,2)}}</td>
                                                    <td rowspan="2">{{ round($jmlcapai1/$bulan1,2) }}</td>
                                                    <td>{{$jmlinput12 }}</td>
                                                    <td rowspan="2">{{ $real2 }}</td>
                                                    <td rowspan="2">{{ $capai2 }}</td>
                                                @else
                                                    @for ($i=1;$i<=2;$i++){
                                                        <td>-</td>
                                                        <td rowspan="2">-</td>
                                                        <td rowspan="2">-</td>
                                                    }
                                                    @endfor
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
                                                    $jmlinput22 = round(Pengukuran::where('id_detail', $detailiku->id)->sum('input_dua'),2);
                                                @endphp
                                                @if ($jml_ukur>0)
                                                    @php
                                                    $jmlinput21=0;
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                        @if($ukur->bulan==="Januari"||$ukur->bulan==="Februari"||$ukur->bulan==="Maret"||$ukur->bulan==="April"||$ukur->bulan==="Mei"||$ukur->bulan==="Juni")
                                                        @php
                                                            $bulan1++;
                                                            $jmlinput11 = round((($jmlinput11 + $ukur->input_satu)),2);
                                                            $jmlinput21 = (($jmlinput21 + $ukur->input_dua));
                                                        @endphp
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $jmlinput21 }}</td>
                                                    <td>{{ $jmlinput22 }} </td>
                                                    @else
                                                        @for ($i=1;$i<=2;$i++){
                                                            <td>-</td>
                                                        }
                                                    @endfor
                                                    @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="11"> Tidak ada data</td>
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
                            <table class="table table-bordered" id="akumulatif"
                                    style="margin-top:2%;background: white;
                                    text-align: center;
                                    vertical-align: middle; font-size:10pt; font-family:'Times New Roman', Times, serif; border-color:black; width:100%;">
                                <thead style="background: white; ">
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3" style="width:35%;" >Sasaran Strategis</th>
                                        <th rowspan="3" style="width:35%;">Indikator Kinerja</th>
                                        <th rowspan="3">Jenis</th>
                                        <th rowspan="3">Target (%)</th>
                                        <th rowspan="3" style="width:50%;">Keterangan Input</th>
                                        <th colspan="6">Realisasi Parsial per Semester Tahun {{ $tahun }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="width:20%;">Semester I (Januari-Juni)</th>
                                        <th colspan="3" style="width:20%;">Semester II (Juli-Desember)</th>
                                    </tr>
                                    <tr>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                            <th>Input</th>
                                            <th rowspan="2">Realisasi (%)</th>
                                            <th rowspan="2">Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    <?php
                                        $no = 1;
                                    ?>
                                    @if ($jml_dtl > 0 )
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
                                                <td rowspan="2">{{ $detailiku->iku->id }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->sasaran->isi_sasaran }}</td>
                                                <td rowspan="2">{{ $detailiku->iku->isi_iku }}</td>
                                                <td rowspan="2">{{ $jenis }}</td>
                                                <td rowspan="2">{{ $detailiku->target }}</td>
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
                                                        $bulan1 = 0;
                                                        $jmlinput11=0;
                                                        $jmlreal1=0;
                                                        $jmlcapai1=0;
                                                        $bulan2 = 0;
                                                        $jmlinput12 = 0;
                                                        $jmlreal2 = 0;
                                                        $jmlcapai2 = 0;
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                            @if($ukur->bulan==="Januari"||$ukur->bulan==="Februari"||$ukur->bulan==="Maret"||$ukur->bulan==="April"||$ukur->bulan==="Mei"||$ukur->bulan==="Juni")
                                                            @php
                                                                $bulan1++;
                                                                $jmlinput11 = round((($jmlinput11 + $ukur->input_satu)),2);
                                                                $jmlreal1 = round((($jmlreal1 + $ukur->realisasi)),2);
                                                                $jmlcapai1 = round((($jmlcapai1 + $ukur->capaian)),2);
                                                            @endphp
                                                            @elseif($ukur->bulan==="Juli"||$ukur->bulan==="Agustus"||$ukur->bulan==="September"||$ukur->bulan==="Oktober"||$ukur->bulan==="November"||$ukur->bulan==="Desember")
                                                            @php
                                                                $bulan2++;
                                                                $jmlinput12 = round((($jmlinput12 + $ukur->input_satu)),2);
                                                                $jmlreal2 = round((($jmlreal2 + $ukur->realisasi)),2);
                                                                $jmlcapai2 = round((($jmlcapai2 + $ukur->capaian)),2);
                                                            @endphp
                                                            @endif
                                                    @endforeach
                                                    <td>{{ $jmlinput11 }}</td>
                                                    <td rowspan="2">{{round($jmlreal1/$bulan1,2)}}</td>
                                                    <td rowspan="2">{{ round($jmlcapai1/$bulan1,2) }}</td>
                                                    <td>{{$jmlinput12 }}</td>
                                                    <td rowspan="2">{{round($jmlreal2/$bulan2,2)}}</td>
                                                    <td rowspan="2">{{ round($jmlcapai2/$bulan2,2) }}</td>
                                                @else
                                                    @for ($i=1;$i<=2;$i++){
                                                        <td>-</td>
                                                        <td rowspan="2">-</td>
                                                        <td rowspan="2">-</td>
                                                    }
                                                    @endfor
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
                                                    $jmlinput22 = round(Pengukuran::where('id_detail', $detailiku->id)->sum('input_dua'),2);
                                                @endphp
                                                @if ($jml_ukur>0)
                                                    @php
                                                    $jmlinput21=0;
                                                    $jmlinput22=0;
                                                    @endphp
                                                    @foreach ($ukur as $ukur)
                                                        @if($ukur->bulan==="Januari"||$ukur->bulan==="Februari"||$ukur->bulan==="Maret"||$ukur->bulan==="April"||$ukur->bulan==="Mei"||$ukur->bulan==="Juni")
                                                        @php
                                                            $jmlinput21 = round(($jmlinput21 + $ukur->input_dua),2);
                                                        @endphp
                                                        @elseif($ukur->bulan==="Juli"||$ukur->bulan==="Agustus"||$ukur->bulan==="September"||$ukur->bulan==="Oktober"||$ukur->bulan==="November"||$ukur->bulan==="Desember")
                                                        @php
                                                            $jmlinput22 = round(($jmlinput22 + $ukur->input_dua),2);
                                                        @endphp
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $jmlinput21 }}</td>
                                                    <td>{{ $jmlinput22 }} </td>
                                                    @else
                                                        @for ($i=1;$i<=2;$i++){
                                                            <td>-</td>
                                                        }
                                                    @endfor
                                                    @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="11"> Tidak ada data</td>
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
    </body>
</html>

@else

<script>
    window.location = "/login";
    confirm("Harap Login Dahulu!");
</script>
@endif
