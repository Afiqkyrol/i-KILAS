@extends('layout2')

@section('head')

<title>VIEW PERMOHONAN KEMASKINI LAMAN WEB</title>

@endsection

@section('body')

<br>

<div style="padding-left:50px; position:fixed">
<a style="padding-left:25px; padding-right:25px;" href="{{route('senarai.kemaskini')}}" class="btn btn-primary btn-sm">Kembali</a>
</div>

<br>

<center><h2><b>BORANG PERMOHONAN KEMASKINI LAMAN WEB</b></h2></center>

    <center>

      
        

            <a href="{{route('print.pdf',['id'=> $id -> id, 'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp&nbspCetak</a>
        
        <br>

        <p><b>Tarikh Mohon: </b>{{ $id->created_at }}</p>
    
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
        <div style="width:60%">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="background-color:#bee1e6" colspan="4"><center>MAKLUMAT PERMOHONAN</center></th>
                </tr>
                <tr>
                    <th style="width:30%">Perkara</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->perkara}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Kategori Saluran</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->kategori_saluran}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Jenis Pengemaskinian</th>
                    <td style="width:70%; padding-top:0px;">:-{{$id->jenis_pengemaskinian}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Kategori Maklumat</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->kategori_maklumat}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Disemak</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->disemak}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Ulasan Penyelia</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->ulasan_penyelia}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Disahkan</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->disahkan}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Ulasan Pengarah</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->ulasan_pengarah}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Dikemaskini</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->dikemaskini}}</td>
                </tr>
                <tr>
                    <th style="width:30%">URL</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->url}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Status</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->status}}</td>
                </tr>
            </table>
        </div>
        <div style="width:60%">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="background-color:#bee1e6" colspan="4"><center>MAKLUMAT KEMASKINI</center></th>
                </tr>
                <tr>
                    <th style="width:30%">Tajuk</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->tajuk}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Isi Maklumat</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-@php echo nl2br($id->keterangan); @endphp</td>
                </tr>
                <tr>
                    <th style="width:25%">Tarikh Paparan</th>
                    <td style="width:25%; padding-top:0px;">:-{{$id->from_date}}</td>
                    <th style="width:25%">Sehingga</th>
                    <td style="width:25%; padding-top:0px;">:-{{$id->to_date}}</td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 1</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->zipdoc}}
                        @if($id->zipdoc != null)
                        <a href="{{route('download.file',['num'=> '1','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 2</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->zipdoc2}}
                        @if($id->zipdoc2 != null)
                        <a href="{{route('download.file',['num'=> '2','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 3</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->zipdoc3}}
                        @if($id->zipdoc3 != null)
                        <a href="{{route('download.file',['num'=> '3','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 4</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->zipdoc4}}
                        @if($id->zipdoc4 != null)
                        <a href="{{route('download.file',['num'=> '4','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 5</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->zipdoc5}}
                        @if($id->zipdoc5 != null)
                        <a href="{{route('download.file',['num'=> '5','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:30%">Dokumen 6</th>
                    <td colspan="3" style="width:70%; padding-top:0px;">:-{{$id->zipdoc6}}
                        @if($id->zipdoc6 != null)
                        <a href="{{route('download.file',['num'=> '6','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </center>

    <br><br>

    <center>
    <form method="POST" action="{{route('tindakan.KemaskiniLamanWeb')}}">
        @csrf

        <label><h4><b>URL KEMASKINI: </b>(optional)</h4></label><br>
        <input style="width:650px" name="url" type="text" value="" /><br>

        <br>

        <input type="hidden" name="id" value="{{$id->id}}" />

        <div><button class="btn btn-success btn-sm" type="submit">SELESAI DIKEMASKINI</button></div>

        <br><br>

    </form>
    </center>
    


@endsection
