
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

        <h3 class=" " style="margin-top:1%">Hasil Pengukuran Kinerja per Triwulan Tahun {{$tahun}}</h3>
        <h3 class="mt-4" >I. Parsial</h3>

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
                            <table class="table table-bordered" id="parsial"
                                    style="margin-top:2%;background: white;
                                    text-align: center;
                                    vertical-align: middle; font-size:10pt; font-family:'Times New Roman', Times, serif; border-color:black; width:100%;">
                                <thead style="background: white; ">
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3" style="width: 10cm;" >Sasaran Strategis</th>
                                        <th rowspan="3">Indikator Kinerja</th>
                                        <th rowspan="3" >jenis</th>
                                        <th rowspan="3">Target (%)</th>
                                        <th rowspan="3">Keterangan Input</th>
                                        <th colspan="12">Realisasi per Triwulan (3 Bulan)</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">I (Jan-Mar)</th>
                                        <th colspan="3">II (Apr-Jun)</th>
                                        <th colspan="3">III (Jul-Sept)</th>
                                        <th colspan="3">IV (Okt-Des)</th>
                                    </tr>
                                    <tr>
                                        <th>Input</th>
                                        <th rowspan="2">Realisasi (%)</th>
                                        <th rowspan="2">Capaian (%)</th>
                                        <th>Input</th>
                                        <th>Realisasi (%)</th>
                                        <th>Capaian (%)</th>
                                        <th>Input</th>
                                        <th>Realisasi (%)</th>
                                        <th>Capaian (%)</th>
                                        <th>Input</th>
                                        <th>Realisasi (%)</th>
                                        <th>Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    @php
                                        $no1 = 1;
                                    @endphp
                                    
                                        @foreach ($detailiku as $iku)
                                        <tr>
                                            <td rowspan="2">{{ $no1++ }}</td>
                                            <td rowspan="2">{{ $iku->iku->sasaran->isi_sasaran }}</td>
                                            <td rowspan="2">{{ $iku->iku->isi_iku }}</td>
                                            <td rowspan="2" >{{ $iku->iku->jenis }}</td>
                                            <td rowspan="2">{{ $iku->target }}</td>
                                            @if (count($iku->iku->inputIku) != 0)
                                            @foreach ($iku->iku->inputIku as $index => $item)
                                            @if($index == 0)
                                            <td>{{ $item->ket_input }}</td>
                                            @else
                                            @endif 
                                            @endforeach
                                            @else  
                                            <td></td>
                                            @endif
                                            
                                            @php
                                                $input = 0;
                                                $input_dua = 0;
                                                $jumrealisasi = 0;
                                                $jumcapaian = 0;

                                                $input1 = 0;
                                                $input_dua1 = 0;
                                                $jumrealisasi1 = 0;
                                                $jumcapaian1 = 0;

                                                $input2 = 0;
                                                $input_dua2 = 0;
                                                $jumrealisasi2 = 0;
                                                $jumcapaian2 = 0;
                                                
                                                $input3 = 0;
                                                $input_dua3 = 0;
                                                $jumrealisasi3 = 0;
                                                $jumcapaian3 = 0;
                                            @endphp
                                            @foreach ($iku->pengukuran as $item)  
                                            @if ($item->bulan === 'Januari' || $item->bulan === 'Februari' || $item->bulan === 'Maret')
                                                @php
                                                    $input += $item->input_satu;
                                                    $input_dua += $item->input_dua;
                                                    $jumrealisasi += $item->realisasi;
                                                    $jumcapaian += $item->capaian;
                                                     
                                                @endphp
                                            @endif  
                                            
                                            @if ($item->bulan === 'April' || $item->bulan === 'Mei' || $item->bulan === 'Juni')
                                                @php
                                                    $input1 += $item->input_satu;
                                                    $input_dua1 += $item->input_dua;
                                                    $jumrealisasi1 += $item->realisasi;
                                                    $jumcapaian1 += $item->capaian;
                                                     
                                                @endphp
                                            @endif
                                            
                                            @if ($item->bulan === 'Juli' || $item->bulan === 'Agustus' || $item->bulan === 'September')
                                                @php
                                                    $input2 += $item->input_satu;
                                                    $input_dua2 += $item->input_dua;
                                                    $jumrealisasi2 += $item->realisasi;
                                                    $jumcapaian2 += $item->capaian;
                                                     
                                                @endphp
                                            @endif

                                            @if ($item->bulan === 'Oktober' || $item->bulan === 'November' || $item->bulan === 'Desember')
                                                @php
                                                    $input3 += $item->input_satu;
                                                    $input_dua3 += $item->input_dua;
                                                    $jumrealisasi3 += $item->realisasi;
                                                    $jumcapaian3 += $item->capaian;
                                                     
                                                @endphp
                                            @endif
                                            @endforeach
                                            @php
                                                $realisasi = round($jumrealisasi /3);
                                                $capaian = round($jumcapaian /3);

                                                $realisasi1 = round($jumrealisasi1 /3);
                                                $capaian1 = round($jumcapaian1 /3);

                                                $realisasi2 = round($jumrealisasi2 /3);
                                                $capaian2 = round($jumcapaian2 /3);

                                                $realisasi3 = round($jumrealisasi3 /3);
                                                $capaian3 = round($jumcapaian3 /3);
                                            @endphp
                                            <td>{{ $input }}</td>
                                            <td rowspan="2">{{ $realisasi }}</td>
                                            <td rowspan="2">{{ $capaian }}</td>                                          
                                            
                                            <td>{{ $input1 }}</td>
                                            <td rowspan="2">{{ $realisasi1 }}</td>
                                            <td rowspan="2">{{ $capaian1 }}</td>                                          
                                            
                                            <td>{{ $input2 }}</td>
                                            <td rowspan="2">{{ $realisasi2 }}</td>
                                            <td rowspan="2">{{ $capaian2 }}</td>                                          
                                            
                                            <td>{{ $input3 }}</td>
                                            <td rowspan="2">{{ $realisasi3 }}</td>
                                            <td rowspan="2">{{ $capaian3 }}</td>                                          
                                            


                                        </tr>
                                        <tr> 
                                            @if (count($iku->iku->inputIku) != 0)
                                            @foreach ($iku->iku->inputIku as $index => $item)
                                            @if($index == 1)
                                            <td>{{ $item->ket_input }}</td>
                                            @else
                                            @endif 
                                            @endforeach
                                            @else  
                                            <td></td>
                                            @endif          
                                            <td>{{ $input_dua }}</td>
                                            <td>{{ $input_dua1 }}</td>
                                            <td>{{ $input_dua2 }}</td>
                                            <td>{{ $input_dua3 }}</td>

                                        </tr>
                                        
                                        @endforeach
                                
                                </tbody>
                            </table>
                            <script>
                                document.getElementById('exportexcel').addEventListener('click', function(){
                                    var table2excel = new Table2Excel();
                                    table2excel.export(document.querySelectorAll("#parsial"));

                                });

                                function sortTableByColumn(parsial,columnNumber) { // (string,integer)
  var tableElement=document.getElementById(tableId);
  [].slice.call(tableElement.tBodies[0].rows).sort(function(a, b) {
    return (
      a.cells[columnNumber-1].textContent<b.cells[columnNumber-1].textContent?-1:
      a.cells[columnNumber-1].textContent>b.cells[columnNumber-1].textContent?1:
      0);
  }).forEach(function(val, index) {
    tableElement.tBodies[0].appendChild(val);
  });
}

                            </script>
                        </div>
                    </div>
                </div>
        

        <h3 class=" " style="margin-top:1%">II. Kumulatif</h3>

        <div class="row mt-3">
            <div class="col-md-12">
                        <a href="{{route('laporan')}}" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-dark btn-sm">BACK</button>
                        </a>
                    <button id="exportexcel1" type="button" class="btn-outline-success btn btn-sm">EXPORT TO EXCEL</button>
            </div>
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-bordered" id="kumulatif"
                                    style="margin-top:2%;background: white;
                                    text-align: center;
                                    vertical-align: middle; font-size:10pt; font-family:'Times New Roman', Times, serif; border-color:black; width:100%;">
                                <thead style="background: white; ">
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3" style="width: 10cm;" >Sasaran Strategis</th>
                                        <th rowspan="3">Indikator Kinerja</th>
                                        <th rowspan="3">Target (%)</th>
                                        <th rowspan="3">Keterangan Input</th>
                                        <th colspan="12">Realisasi per Triwulan (3 Bulan)</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">I (Jan-Mar)</th>
                                        <th colspan="3">II (Apr-Jun)</th>
                                        <th colspan="3">III (Jul-Sept)</th>
                                        <th colspan="3">IV (Okt-Des)</th>
                                    </tr>
                                    <tr>
                                        <th>Input</th>
                                        <th rowspan="2">Realisasi (%)</th>
                                        <th rowspan="2">Capaian (%)</th>
                                        <th>Input</th>
                                        <th>Realisasi (%)</th>
                                        <th>Capaian (%)</th>
                                        <th>Input</th>
                                        <th>Realisasi (%)</th>
                                        <th>Capaian (%)</th>
                                        <th>Input</th>
                                        <th>Realisasi (%)</th>
                                        <th>Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody style="background: white; ">
                                    @php
                                        $no = 1;
                                    @endphp
                                        @foreach ($detailiku as $iku)
                                        <tr>
                                            <td rowspan="2">{{ $no++}}</td>
                                            <td rowspan="2">{{ $iku->iku->sasaran->isi_sasaran }}</td>
                                            <td rowspan="2">{{ $iku->iku->isi_iku }}</td>
                                            <td rowspan="2">{{ $iku->target }}</td>
                                            
                                            @if (count($iku->iku->inputIku) != 0)
                                            @foreach ($iku->iku->inputIku as $index => $item)
                                            @if($index == 0)
                                            <td>{{ $item->ket_input }}</td>
                                            @else
                                            @endif 
                                            @endforeach
                                            @else  
                                            <td></td>
                                            @endif
                                            
                                            
                                            @php
                                                $input = 0;
                                                $input_dua = 0;
                                                $jumrealisasi = 0;
                                                $jumcapaian = 0;

                                            
                                                $jumrealisasi1 = 0;
                                                $jumcapaian1 = 0;

                                                $input2 = 0;
                                                $input_dua2 = 0;
                                                $jumrealisasi2 = 0;
                                                $jumcapaian2 = 0;
                                                
                                                $input3 = 0;
                                                $input_dua3 = 0;
                                                $jumrealisasi3 = 0;
                                                $jumcapaian3 = 0;
                                            @endphp
                                            @foreach ($iku->pengukuran as $item)  
                                            @if ($item->bulan === 'Januari' || $item->bulan === 'Februari' || $item->bulan === 'Maret')
                                                @php
                                                    $input += $item->input_satu;
                                                    $input_dua += $item->input_dua;
                                                    $jumrealisasi += $item->realisasi;
                                                    $jumcapaian += $item->capaian;

                                                    $realisasi = round($jumrealisasi /3);
                                                    $capaian = round($jumcapaian /3);

                                                    $input1 = $input2 = $input3 = $input;
                                                    $input_dua1 = $input_dua2 = $input_dua3 = $input_dua;
                                                    $jumrealisasi1 = $jumrealisasi2 = $jumrealisasi3 = $jumrealisasi;
                                                    $jumcapaian1 = $jumcapaian2 = $jumcapaian3 = $jumcapaian;
                                                    $realisasi1 = $realisasi2 = $realisasi3 = $realisasi; 
                                                    $capaian1 = $capaian2 = $capaian3 = $capaian;
                                                     
                                                @endphp
                                            @endif  
                                            
                                            @if ($item->bulan === 'April' || $item->bulan === 'Mei' || $item->bulan === 'Juni')
                                                @php
                                                    
                                                    $input1 += $item->input_satu;
                                                    $input_dua1 += $item->input_dua;
                                                    $jumrealisasi1 += $item->realisasi;
                                                    $jumcapaian1 += $item->capaian;

                                                    
                                                    $realisasi1 = round($jumrealisasi1 /6);
                                                    $capaian1 = round($jumcapaian1 /6);


                                                    $input2 = $input3 = $input1;
                                                    $input_dua2 = $input_dua3 = $input_dua1;
                                                    $jumrealisasi2 = $jumrealisasi3 = $jumrealisasi1;
                                                    $jumcapaian2 = $jumcapaian3 = $jumcapaian1;
                                                    $realisasi2 = $realisasi3 = $realisasi1; 
                                                    $capaian2 = $capaian3 =$capaian1;
                                                     
                                                     
                                                @endphp
                                            @endif
                                            
                                            @if ($item->bulan === 'Juli' || $item->bulan === 'Agustus' || $item->bulan === 'September')
                                                @php
                                                    $input2 += $item->input_satu;
                                                    $input_dua2 += $item->input_dua;
                                                    $jumrealisasi2 += $item->realisasi;
                                                    $jumcapaian2 += $item->capaian;

                                                    $realisasi2 = round($jumrealisasi2 /9);
                                                    $capaian2 = round($jumcapaian2 /9);

                                                    $input3 = $input2;
                                                    $input_dua3 = $input_dua2;
                                                    $jumrealisasi3 = $jumrealisasi2;
                                                    $jumcapaian3 = $jumcapaian2;
                                                    $realisasi3 = $realisasi2; 
                                                    $capaian3 = $capaian2;
                                                     
                                                     
                                                @endphp
                                            @endif

                                            @if ($item->bulan === 'Oktober' || $item->bulan === 'November' || $item->bulan === 'Desember')
                                                @php
                                                    $input3 += $item->input_satu;
                                                    $input_dua3 += $item->input_dua;
                                                    $jumrealisasi3 += $item->realisasi;
                                                    $jumcapaian3 += $item->capaian;

                                                    $realisasi3 = round($jumrealisasi3 /12);
                                                    $capaian3 = round($jumcapaian3 /12);
                                                    
                                                     
                                                @endphp
                                            @endif
                                            @endforeach
                                            @php
                                                
                                                
                                                

                                                
                                            @endphp
                                            <td>{{ $input }}</td>
                                            <td rowspan="2">{{ $realisasi }}</td>
                                            <td rowspan="2">{{ $capaian }}</td>                                          
                                            
                                            <td>{{ $input1 }}</td>
                                            <td rowspan="2">{{ $realisasi1 }}</td>
                                            <td rowspan="2">{{ $capaian1 }}</td>                                          
                                            
                                            <td>{{ $input2 }}</td>
                                            <td rowspan="2">{{ $realisasi2 }}</td>
                                            <td rowspan="2">{{ $capaian2 }}</td>                                          
                                            
                                            <td>{{ $input3 }}</td>
                                            <td rowspan="2">{{ $realisasi3 }}</td>
                                            <td rowspan="2">{{ $capaian3 }}</td>                                          
                                            


                                        </tr>
                                        <tr>            
                                            @if (count($iku->iku->inputIku) != 0)
                                            @foreach ($iku->iku->inputIku as $index => $item)
                                            @if($index == 1)
                                            <td>{{ $item->ket_input }}</td>
                                            @else
                                            @endif 
                                            @endforeach
                                            @else  
                                            <td></td>
                                            @endif
                                            <td>{{ $input_dua }}</td>
                                            <td>{{ $input_dua1 }}</td>
                                            <td>{{ $input_dua2 }}</td>
                                            <td>{{ $input_dua3 }}</td>

                                        </tr>
                                        
                                        @endforeach
                                    
                                </tbody>
                            </table>
                            <script>
                                document.getElementById('exportexcel1').addEventListener('click', function(){
                                    var table2excel = new Table2Excel();
                                    table2excel.export(document.querySelectorAll("#kumulatif"));

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
