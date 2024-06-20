@extends('layout2')

@section('head')

<title>Laporan Maklumat</title>

@endsection

@section('body')

<br>

<!-- SELECT2 EXAMPLE -->
<form method="GET">
    <input type="hidden" name="jenis_permohonan"value="lamanweb">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">KETETAPAN</h3>

            <div class="card-tools">
              <div style="width:5%">
                <button class="btn btn-success btn-sm" type="submit">Cari</button>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>TARIKH: Dari</label>
                    <div class="input-group date">
                        <input name="dari" type="date" class="form-control" value="{{ $dari }}"/>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Hingga</label>
                    <div class="input-group date">
                        <input name="sehingga" type="date" class="form-control" value="{{ $sehingga }}"/>
                    </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Jabatan/Bahagian/Unit</label>
                  <select name="fjabatan" class="form-control select2" style="width: 100%;">
                    <option @php if($_SESSION['fjabatan']=="SEMUA"){ @endphp selected="selected" @php } @endphp value ="SEMUA">Semua</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN KHIDMAT PENGURUSAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN KHIDMAT PENGURUSAN">JABATAN KHIDMAT PENGURUSAN</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN KEWANGAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN KEWANGAN">JABATAN KEWANGAN</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN KEJURUTERAAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN KEJURUTERAAN">JABATAN KEJURUTERAAN</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN PERANCANG BANDAR DAN DESA"){ @endphp selected="selected" @php } @endphp value ="JABATAN PERANCANG BANDAR DAN DESA">JABATAN PERANCANG BANDAR DAN DESA</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN BANGUNAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN BANGUNAN">JABATAN BANGUNAN</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN PENILAIAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN PENILAIAN">JABATAN PENILAIAN</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN PENGURUSAN HARTA"){ @endphp selected="selected" @php } @endphp value ="JABATAN PENGURUSAN HARTA">JABATAN PENGURUSAN HARTA</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN UNDANG-UNDANG"){ @endphp selected="selected" @php } @endphp value ="JABATAN UNDANG-UNDANG">JABATAN UNDANG-UNDANG</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN KEMASYARAKATAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN KEMASYARAKATAN">JABATAN KEMASYARAKATAN</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN KESIHATAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN KESIHATAN">JABATAN KESIHATAN</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN PENGUATKUASA"){ @endphp selected="selected" @php } @endphp value ="JABATAN PENGUATKUASA">JABATAN PENGUATKUASA</option>
			        <option @php if($_SESSION['fjabatan']=="JABATAN PELESENAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN PELESENAN">JABATAN PELESENAN</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN PENGURUSAN PASAR & PENJAJA"){ @endphp selected="selected" @php } @endphp value ="JABATAN PENGURUSAN PASAR & PENJAJA">JABATAN PENGURUSAN PASAR & PENJAJA</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN TAMAN DAN REKREASI"){ @endphp selected="selected" @php } @endphp value ="JABATAN TAMAN DAN REKREASI">JABATAN TAMAN DAN REKREASI</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN KOMUNIKASI KORPORAT"){ @endphp selected="selected" @php } @endphp value ="JABATAN KOMUNIKASI KORPORAT">JABATAN KOMUNIKASI KORPORAT</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN TEKNOLOGI MAKLUMAT"){ @endphp selected="selected" @php } @endphp value ="JABATAN TEKNOLOGI MAKLUMAT">JABATAN TEKNOLOGI MAKLUMAT</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN PERKHIDMATAN PERSEKITARAN"){ @endphp selected="selected" @php } @endphp value ="JABATAN PERKHIDMATAN PERSEKITARAN">JABATAN PERKHIDMATAN PERSEKITARAN</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN PUSAT SETEMPAT (OSC)"){ @endphp selected="selected" @php } @endphp value ="JABATAN PUSAT SETEMPAT (OSC)">JABATAN PUSAT SETEMPAT (OSC)</option>
                    <option @php if($_SESSION['fjabatan']=="JABATAN PESURUHJAYA BANGUNAN (COB)"){ @endphp selected="selected" @php } @endphp value ="JABATAN PESURUHJAYA BANGUNAN (COB)">JABATAN PESURUHJAYA BANGUNAN (COB)</option>
                    <option @php if($_SESSION['fjabatan']=="BAHAGIAN AUDIT DALAM"){ @endphp selected="selected" @php } @endphp value ="BAHAGIAN AUDIT DALAM">BAHAGIAN AUDIT DALAM</option>
                    <option @php if($_SESSION['fjabatan']=="BAHAGIAN UKUR BAHAN"){ @endphp selected="selected" @php } @endphp value ="BAHAGIAN UKUR BAHAN">BAHAGIAN UKUR BAHAN</option>
                    <option @php if($_SESSION['fjabatan']=="UNIT PENYAMPAIAN PERKHIDMATAN (SDU)"){ @endphp selected="selected" @php } @endphp value ="UNIT PENYAMPAIAN PERKHIDMATAN (SDU)">UNIT PENYAMPAIAN PERKHIDMATAN (SDU)</option>
                    <option @php if($_SESSION['fjabatan']=="UNIT INTEGRITI"){ @endphp selected="selected" @php } @endphp value ="UNIT INTEGRITI">UNIT INTEGRITI</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control select2bs4" style="width: 100%;">
                    <option @php if($_SESSION['status']=="SEMUA"){ @endphp selected="selected" @php } @endphp value="SEMUA">Semua</option>
                    <option @php if($_SESSION['status']=="DIPROSES"){ @endphp selected="selected" @php } @endphp value="DIPROSES">Diproses</option>
                    <option @php if($_SESSION['status']=="PERLU DIEDIT"){ @endphp selected="selected" @php } @endphp value="PERLU DIEDIT">Perlu Diedit</option>
                    <option @php if($_SESSION['status']=="SELESAI"){ @endphp selected="selected" @php } @endphp value="SELESAI">Selesai</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
</form>
<!-- /.card -->
<br>

@php

$i=1;

@endphp

<div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                    @if($_SESSION['jenis_permohonan'] == "lamanweb")
                      <a class="nav-link active" href="#lamanweb" data-toggle="tab">Permohonan Kemaskini Laman Web</a>
                    @else
                      <a class="nav-link" href="#lamanweb" data-toggle="tab">Permohonan Kemaskini Laman Web</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if($_SESSION['jenis_permohonan'] == "aduan")
                      <a class="nav-link active" href="#aduan" data-toggle="tab">Permohonan Kemaskini Aduan</a>
                    @else
                      <a class="nav-link" href="#aduan" data-toggle="tab">Permohonan Kemaskini Aduan</a>
                    @endif
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  @if($_SESSION['jenis_permohonan'] == "lamanweb")
                  <div class="chart tab-pane active" id="lamanweb">
                  @else
                  <div class="chart tab-pane" id="lamanweb">
                  @endif
                      <table class="table table-bordered table-striped">
                        <thead style="background-color:#f8f9fa">
                            <tr>
                                <th>TARIKH MOHON</th>
                                <th>NAMA PEMOHON</th>
                                <th>PERKARA</th>
                                <th>JENIS PENGEMASKINIAN/ADUAN</th>
                                <th>DISEMAK OLEH:</th>
                                <th>DISAHKAN OLEH:</th>
                                <th>DIKEMASKINI OLEH:</th>
                                <th>STATUS</th>
                                <th>LIHAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($lamanweb->count() == 0)
                            <tr>
                                <td colspan="9"><center>Tiada Permohonan.</center></td>
                            </tr>
                            @endif

                            @foreach ($lamanweb as $data)
                            <tr>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->perkara }}</td>
                                <td>{{ $data->jenis_pengemaskinian }}</td>
                                <td>{{ $data->disemak }}</td>
                                <td>{{ $data->disahkan }}</td>
                                <td>{{ $data->dikemaskini }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a href="{{route('lihat.pdf',['id'=> $data -> id, 'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>


                        {{ $lamanweb->appends(['dari'=>$dari, 'sehingga'=>$sehingga, 'fjabatan'=>$fjabatan, 'status'=>$status, 'jenis_permohonan'=>'lamanweb'])->links('pagination::bootstrap-4') }}

                  </div>
                  @if($_SESSION['jenis_permohonan'] == "aduan")
                  <div class="chart tab-pane active" id="aduan">
                  @else
                  <div class="chart tab-pane" id="aduan">
                  @endif

                        <table class="table table-bordered table-striped">
                        <thead style="background-color:#f8f9fa">
                            <tr>
                                <th>TARIKH MOHON</th>
                                <th>NAMA PEMOHON</th>
                                <th>PERKARA</th>
                                <th>JENIS PENGEMASKINIAN/ADUAN</th>
                                <th>DISEMAK OLEH:</th>
                                <th>DISAHKAN OLEH:</th>
                                <th>DIKEMASKINI OLEH:</th>
                                <th>STATUS</th>
                                <th>LIHAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($aduan->count() == 0)
                            <tr>
                                <td colspan="9"><center>Tiada Permohonan.</center></td>
                            </tr>
                            @endif

                            @foreach ($aduan as $data2)
                            <tr>
                                <td>{{ $data2->created_at }}</td>
                                <td>{{ $data2->nama_pengadu }}</td>
                                <td>{{ $data2->perkara }}</td>
                                <td>{{ $data2->jenis_aduan }}</td>
                                <td>{{ $data2->disemak }}</td>
                                <td>{{ $data2->disahkan }}</td>
                                <td>{{ $data2->dikemaskini }}</td>
                                <td>{{ $data2->status }}</td>
                                <td>
                                    <a href="{{route('lihat.pdf',['id'=> $data2 -> id, 'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>


                        {{ $aduan->appends(['dari'=>$dari, 'sehingga'=>$sehingga, 'fjabatan'=>$fjabatan, 'status'=>$status, 'jenis_permohonan'=>'aduan'])->links('pagination::bootstrap-4') }}


                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


@endsection
