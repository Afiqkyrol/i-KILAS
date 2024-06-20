@extends('layout2')

@section('head')





<title>Senarai Permohonan Jabatan</title>

@endsection

@section('body')

<br><center><h2><b>SENARAI PERMOHONAN JABATAN</b></h2></center><br>

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

                                        if($data->status == "PERLU DIEDIT" && $data->disahkan == "-" && $data->nokp == $_SESSION["nokp"]){ @endphp

                                            <a href="{{route('senarai.editLamanWeb1',['id'=> $data -> id])}}" class="btn btn-primary btn-sm">Edit Permohonan</a>
                                            @php
                                        }

                                    @endphp
                                </td>
                                <td>

                                    <b>{{$data->disahkan}}</b>
                                    @php

                                        if($data->status == "PERLU DIEDIT" && $data->disahkan != "-" && $data->nokp == $_SESSION["nokp"]){ @endphp

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

                                        <br><button style="padding-left:0px" type="button" class="btn btn-link"><a href="{{$data->url}}" >URL Dikemaskini</a></button>

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
                                <td>{{ $data2->perkara }}</td>
                                <td>{{ $data2->jenis_aduan }}</td>
                                <td>

                                    <b>{{ $data2->disemak }}</b><br>
                                    @php

                                        if($data2->status == "PERLU DIEDIT" && $data2->disahkan == "-" && $data2->nokp == $_SESSION["nokp"]){ @endphp

                                            <a href="{{route('senarai.editAduan',['id'=> $data2 -> id])}}" class="btn btn-primary btn-sm">Edit Permohonan</a>
                                             @php

                                        }

                                    @endphp

                                </td>
                                <td>

                                    <b>{{ $data2->disahkan }}</b>
                                    @php

                                        if($data2->status == "PERLU DIEDIT" && $data2->disahkan != "-" && $data2->nokp == $_SESSION["nokp"]){ @endphp

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

                                        <br><button style="padding-left:0px" type="button" class="btn btn-link"><a href="{{$data2->url}}" >URL Dikemaskini</a></button>

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
