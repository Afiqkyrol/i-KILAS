@extends('layout2')

@section('head')

<title>Senarai Semakan</title>

@endsection

@section('body')

<br><center><h2><b>SENARAI PERMOHONAN UNTUK DISEMAK</b></h2></center><br>

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
                                <td><a href="{{route('senarai.viewSemakanLamanWeb',['id'=> $data -> id])}}" class="btn btn-primary btn-sm">Tindakan</a></td>
                                
                            </tr>
                            @endforeach

                            @foreach ($list2 as $data2)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data2->created_at }}<p style="color:green"> added {{$data2->created_at->diffForHumans()}}</p></td>
                                <td>{{ $data2->nama_pengadu }}</td>
                                <td>{{ $data2->perkara }}</td>
                                <td>{{ $data2->jenis_aduan }}</td>
                                <td><a href="{{route('senarai.viewSemakanAduan',['id'=> $data2 -> id])}}" class="btn btn-primary btn-sm">Tindakan</a></td>
                                
                            </tr>
                            @endforeach

                            @php

                            if($list->isEmpty() && $list2->isEmpty()){@endphp

                            <td colspan="6"><center>Tiada Permohonan Yang Perlu Disemak</center></td>

                            @php
                            }
                            @endphp
                            
                        </tbody>
                       
                        
@endsection
