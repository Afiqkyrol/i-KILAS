@extends('layout2')

@section('head')

<title>Senarai Permohonan Saya</title>

@endsection

@section('body')

<br><center><h2><b>SENARAI PERMOHONAN SAYA</b></h2></center><br>

@php

$i=1;


@endphp

<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>TARIKH MOHON</th>
                                <th>PERKARA</th>
                                <th>JENIS PENGEMASKINIAN/ADUAN</th>
                                <th>DISEMAK OLEH:</th>
                                <th>DISAHKAN OLEH:</th>
                                <th>DIKEMASKINI OLEH:</th>
                                <th>STATUS</th>
                                <th>VIEW</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->created_at }}<p style="color:green"> added {{$data->created_at->diffForHumans()}}</p></td>
                                <td>{{ $data->perkara }}</td>
                                <td>{{ $data->jenis_pengemaskinian }}</td>
                                <td>

                                    <b>{{$data->disemak}}</b><br>
                                    @php

                                        if($data->status == "PERLU DIEDIT" && $data->disahkan == "-"){ @endphp

                                            <a href="{{route('senarai.editLamanWeb1',['id'=> $data -> id])}}" class="btn btn-primary btn-sm">Edit Permohonan</a>
                                            @php
                                        }

                                    @endphp
                                </td>
                                <td>

                                    <b>{{$data->disahkan}}</b>
                                    @php

                                        if($data->status == "PERLU DIEDIT" && $data->disahkan != "-"){ @endphp

                                            <a href="{{route('senarai.editLamanWeb1',['id'=> $data -> id])}}" class="btn btn-primary btn-sm">Edit Permohonan</a>
                                            @php
                                        }

                                    @endphp


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
                                <td>

                                    @php
                                    if($data->status != "SELESAI"){ @endphp

                                    <a href="{{route('delete.LamanWeb',['id'=> $data -> id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>

                                    @php
                                    }else{
                                    @endphp

                                    <a href="{{route('remove.LamanWeb',['id'=> $data -> id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>

                                    @php
                                    }
                                    @endphp

                                 </td>
                            </tr>
                            @endforeach

                            @foreach ($list2 as $data2)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data2->created_at }}<p style="color:green"> added {{$data2->created_at->diffForHumans()}}</p></td>
                                <td>{{ $data2->perkara }}</td>
                                <td>{{ $data2->jenis_aduan }}</td>
                                <td>

                                    <b>{{ $data2->disemak }}</b><br>
                                    @php

                                        if($data2->status == "PERLU DIEDIT" && $data2->disahkan == "-"){ @endphp

                                            <a href="{{route('senarai.editAduan',['id'=> $data2 -> id])}}" class="btn btn-primary btn-sm">Edit Permohonan</a>
                                             @php

                                        }

                                    @endphp

                                </td>
                                <td>

                                    <b>{{ $data2->disahkan }}</b>
                                    @php

                                        if($data2->status == "PERLU DIEDIT" && $data2->disahkan != "-"){ @endphp

                                            <a href="{{route('senarai.editAduan',['id'=> $data2 -> id])}}" class="btn btn-primary btn-sm">Edit Permohonan</a>
                                            @php
                                        }

                                    @endphp

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
                                <td>

                                    @php
                                    if($data2->status != "SELESAI"){ @endphp

                                    <a href="{{route('delete.Aduan',['id'=> $data2 -> id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>

                                    @php
                                    }else{
                                    @endphp

                                    <a href="{{route('remove.Aduan',['id'=> $data2 -> id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>

                                    @php
                                    }
                                    @endphp

                                </td>
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
