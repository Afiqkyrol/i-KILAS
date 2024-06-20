@extends('layout2')

@section('head')





<title>Senarai Kemaskini</title>

@endsection

@section('body')

<br><center><h2><b>SENARAI PERMOHONAN UNTUK DIKEMASKINI</b></h2></center><br>

@php

$i=1;


@endphp

<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>TARIKH MOHON</th>
                                <th>NAMA PEMOHON</th>
                                <th>PERKARA</th>
                                <th>JENIS PENGEMASKINIAN/ADUAN</th>
                                <th>DISEMAK</th>
                                <th>DISAHKAN</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->created_at }}<p style="color:green"> added {{$data->created_at->diffForHumans()}}</p></td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->perkara }}</td>
                                <td>{{ $data->jenis_pengemaskinian }}</td>
                                <td><b>{{ $data->disemak }}</b></td>
                                <td><b>{{ $data->disahkan }}</b></td>
                                <td><a href="{{route('senarai.viewKemaskiniLamanWeb',['id'=> $data -> id])}}" class="btn btn-primary btn-sm">Kemaskini</a></td>
                                
                            </tr>
                            @endforeach

                            @foreach ($list2 as $data2)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data2->created_at }}<p style="color:green"> added {{$data2->created_at->diffForHumans()}}</p></td>
                                <td>{{ $data2->nama_pengadu }}</td>
                                <td>{{ $data2->perkara }}</td>
                                <td>{{ $data2->jenis_aduan }}</td>
                                <td><b>{{ $data2->disemak }}</b></td>
                                <td><b>{{ $data2->disahkan }}</b></td>
                                <td><a href="{{route('senarai.viewKemaskiniAduan',['id'=> $data2 -> id])}}" class="btn btn-primary btn-sm">Kemaskini</a></td>
                                
                            </tr>
                            @endforeach

                            @php

                            if($list->isEmpty() && $list2->isEmpty()){@endphp

                            <td colspan="8"><center>Tiada Permohonan Yang Perlu Dikemaskini</center></td>

                            @php
                            }
                            @endphp
                            
                            
                        </tbody>
                       
                        
@endsection
