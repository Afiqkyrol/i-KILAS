<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

  <br>
  <title>Laporan Permohonan</title>

</head>
<body>

    <center>

      
        <h1>{{ $title }}</h1>

        @php if($permohonan->perkara == "KEMASKINI LAMAN WEB"){ @endphp
             <a href="{{route('print.pdf',['id'=> $permohonan -> id, 'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp&nbspCetak</a>
        @php }else{ @endphp
             <a href="{{route('print.pdf',['id'=> $permohonan -> id, 'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp&nbspCetak</a>
        @php } @endphp

        <br>

        <p><b>Tarikh Mohon: </b>{{ $permohonan->created_at }}</p>
    
        <div style="width:60%">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="background-color:#bee1e6" colspan="4"><center>MAKLUMAT PEMOHON</center></th>
                </tr>
                <tr>
                    <th style="width:30%">Nama Pemohon</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$user->fullname}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Nombor Kad Pengenalan</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$user->nokp}}</td>
                </tr>
                <tr>
                    <th style="width:25%">Nombor Telefon</th>
                    <td style="width:25%; padding-top:0px;">:-{{$user->no_telefon}}</td>
                    <th style="width:25%">Jantina</th>
                    <td style="width:25%; padding-top:0px;">:-{{$user->jantina}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Alamat Emel</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$user->email}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Jabatan</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$user->jabatan}}</td>
                </tr>
            </table>
        </div>
        @php if($permohonan->perkara == "KEMASKINI LAMAN WEB") { @endphp
        <div style="width:60%">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="background-color:#bee1e6" colspan="4"><center>MAKLUMAT PERMOHONAN</center></th>
                </tr>
                <tr>
                    <th style="width:30%">Perkara</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->perkara}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Kategori Saluran</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->kategori_saluran}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Jenis Pengemaskinian</th>
                    <td style="width:70%; padding-top:0px;">:-{{$permohonan->jenis_pengemaskinian}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Kategori Maklumat</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->kategori_maklumat}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Disemak</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->disemak}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Ulasan Penyelia</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->ulasan_penyelia}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Disahkan</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->disahkan}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Ulasan Pengarah</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->ulasan_pengarah}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Dikemaskini</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->dikemaskini}}</td>
                </tr>
                <tr>
                    <th style="width:30%">URL</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->url}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Status</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->status}}</td>
                </tr>
            </table>
        </div>
        <br>
        <div style="width:60%">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="background-color:#bee1e6" colspan="4"><center>MAKLUMAT KEMASKINI</center></th>
                </tr>
                <tr>
                    <th style="width:30%">Tajuk</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->tajuk}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Isi Maklumat</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-@php echo nl2br($permohonan->keterangan); @endphp</td>
                </tr>
                <tr>
                    <th style="width:25%">Tarikh Paparan</th>
                    <td style="width:25%; padding-top:0px;">:-{{$permohonan->from_date}}</td>
                    <th style="width:25%">Sehingga</th>
                    <td style="width:25%; padding-top:0px;">:-{{$permohonan->to_date}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 1</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc}}
                        @if($permohonan->zipdoc != null)
                        <a href="{{route('download.file',['num'=> '1','id'=>$permohonan->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 2</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc2}}
                        @if($permohonan->zipdoc2 != null)
                        <a href="{{route('download.file',['num'=> '2','id'=>$permohonan->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 3</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc3}}
                        @if($permohonan->zipdoc3 != null)
                        <a href="{{route('download.file',['num'=> '3','id'=>$permohonan->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 4</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc4}}
                        @if($permohonan->zipdoc4 != null)
                        <a href="{{route('download.file',['num'=> '4','id'=>$permohonan->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 5</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc5}}
                        @if($permohonan->zipdoc5 != null)
                        <a href="{{route('download.file',['num'=> '5','id'=>$permohonan->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 6</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc6}}
                        @if($permohonan->zipdoc6 != null)
                        <a href="{{route('download.file',['num'=> '6','id'=>$permohonan->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    @php }else{ @endphp
        <br>
        <div style="width:60%">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="background-color:#bee1e6" colspan="4"><center>MAKLUMAT PERMOHONAN</center></th>
                </tr>
                <tr>
                    <th style="width:30%">Perkara</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->perkara}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Nombor Rujukan</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->no_rujukan}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Jenis Aduan</th>
                    <td style="width:70%; padding-top:0px;">:-{{$permohonan->jenis_aduan}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Disemak</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->disemak}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Ulasan Penyelia</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->ulasan_penyelia}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Disahkan</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->disahkan}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Ulasan Pengarah</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->ulasan_pengarah}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Dikemaskini</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->dikemaskini}}</td>
                </tr>
                <tr>
                    <th style="width:30%">URL</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->url}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Status</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->status}}</td>
                </tr>
            </table>
        </div>
        <br>
        <div style="width:60%">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="background-color:#bee1e6" colspan="4"><center>MAKLUMAT ADUAN</center></th>
                </tr>
                <tr>
                    <th style="width:30%">Keterangan Aduan</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-@php echo nl2br($permohonan->keterangan_aduan); @endphp</td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 1</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc}}
                        @if($permohonan->zipdoc != null)
                        <a href="{{route('download.file',['num'=> '1','id'=>$permohonan->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                    
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 2</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc2}}
                        @if($permohonan->zipdoc2 != null)
                        <a href="{{route('download.file',['num'=> '2','id'=>$permohonan->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 3</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc3}}
                        @if($permohonan->zipdoc3 != null)
                        <a href="{{route('download.file',['num'=> '3','id'=>$permohonan->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 4</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc4}}
                        @if($permohonan->zipdoc4 != null)
                        <a href="{{route('download.file',['num'=> '4','id'=>$permohonan->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 5</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc5}}
                        @if($permohonan->zipdoc5 != null)
                        <a href="{{route('download.file',['num'=> '5','id'=>$permohonan->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 6</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$permohonan->zipdoc6}}
                        @if($permohonan->zipdoc6 != null)
                        <a href="{{route('download.file',['num'=> '6','id'=>$permohonan->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

    @php } @endphp

        @php if($permohonan->perkara == "KEMASKINI LAMAN WEB"){ @endphp
             <a href="{{route('print.pdf',['id'=> $permohonan -> id, 'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp&nbspCetak</a>
        @php }else{ @endphp
             <a href="{{route('print.pdf',['id'=> $permohonan -> id, 'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp&nbspCetak</a>
        @php } @endphp

        

    </center>
    <br><br>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    

</body>
</html>
