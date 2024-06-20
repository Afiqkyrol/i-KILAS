@extends('layout2')

@section('head')

<title>Senarai Permohonan Saya</title>

@endsection

@section('body')

<br><center><h2><b>SENARAI PERMOHONAN</b></h2></center><br>

@php

$i=1;


@endphp

<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>TARIKH MOHON</th>
                                <th>NAMA PEMOHON</th>
                                <th>JAB./BAH./UNIT</th>
                                <th>PERKARA</th>
                                <th>DISEMAK OLEH:</th>
                                <th>DISAHKAN OLEH:</th>
                                <th>DIKEMASKINI OLEH:</th>
                                <th>STATUS</th>
                                <th>LIHAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->created_at }}<p style="color:green"> added {{$data->created_at->diffForHumans()}}</p></td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->perkara }}</td>
                                <td>

                                    <b>{{$data->disemak}}</b><br>
                                </td>
                                <td>

                                    <b>{{$data->disahkan}}</b>


                                </td>
                                <td><b>{{$data->dikemaskini}}</b></td>
                                <td>

                                    <b>{{ $data->status }}</b>

                                    @php
                                    if($data->url != ""){ @endphp

                                        <br><button style="padding-left:0px" type="button" class="btn btn-link"><a href="{{$data->url}}" target="_blank">URL Dikemaskini</a></button>

                                    @php
                                    }
                                    @endphp

                                </td>
                                <td><a href="{{route('lihat.pdf',['id'=> $data -> id, 'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm" target="_blank">Lihat</a></td>
                                
                            </tr>
                            @endforeach

                            @foreach ($list2 as $data2)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data2->created_at }}<p style="color:green"> added {{$data2->created_at->diffForHumans()}}</p></td>
                                <td>{{ $data2->nama_pengadu }}</td>
                                <td>{{ $data2->jabatan }}</td>
                                <td>{{ $data2->perkara }}</td>
                                <td>

                                    <b>{{ $data2->disemak }}</b><br>

                                </td>
                                <td>

                                    <b>{{ $data2->disahkan }}</b>

                                </td>
                                <td><b>{{$data2->dikemaskini}}</b></td>
                                <td>

                                    <b>{{ $data2->status }}</b>

                                    @php
                                    if($data2->url != ""){ @endphp

                                        <br><button style="padding-left:0px" type="button" class="btn btn-link"><a href="{{$data2->url}}" target="_blank">URL Dikemaskini</a></button>

                                    @php
                                    }
                                    @endphp

                                </td>
                                <td><a href="{{route('lihat.pdf',['id'=> $data2 -> id, 'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm" target="_blank">Lihat</a></td>
                                
                            </tr>
                            @endforeach

                            @php

                            if($list->isEmpty() && $list2->isEmpty()){@endphp

                            <td colspan="10"><center>Tiada Permohonan</center></td>

                            @php
                            }
                            @endphp

                        </tbody>

@endsection
