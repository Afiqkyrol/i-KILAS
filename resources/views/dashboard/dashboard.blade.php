@extends('layout2')

@section('head')

<title>Paparan Utama</title>

@endsection

@section('body')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Paparan Utama</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i><ion-icon name="list-outline"></ion-icon></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Semua Permohonan</span>
                <span class="info-box-number">@php echo $_SESSION['permohonan_num']; @endphp Permohonan</span>
              </div>
              @if($user->jabatan != "JABATAN TEKNOLOGI MAKLUMAT")
              <a href="{{route('senarai.permohonan')}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @else
              <a href="{{route('Adminsenarai.status',['status'=> 'SEMUA'])}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @endif
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i><ion-icon name="thumbs-down-outline"></ion-icon></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Permohonan Ditolak</span>
                <span class="info-box-number">@php echo $_SESSION['permohonan_ditolak_num']; @endphp Permohonan</span>
              </div>
              @if($user->jabatan != "JABATAN TEKNOLOGI MAKLUMAT")
              <a href="{{route('senarai.status',['status'=> 'PERLU DIEDIT'])}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @else
              <a href="{{route('Adminsenarai.status',['status'=> 'PERLU DIEDIT'])}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @endif
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i><ion-icon name="ellipsis-horizontal-outline"></ion-icon></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Permohonan Diproses</span>
                <span class="info-box-number">@php echo $_SESSION['permohonan_diproses_num']; @endphp Permohonan</span>
              </div>
              @if($user->jabatan != "JABATAN TEKNOLOGI MAKLUMAT")
              <a href="{{route('senarai.status',['status'=> 'DIPROSES'])}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @else
              <a href="{{route('Adminsenarai.status',['status'=> 'DIPROSES'])}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @endif
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i><ion-icon name="checkmark-done-outline"></ion-icon></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pemohonan Selesai</span>
                <span class="info-box-number">@php echo $_SESSION['permohonan_selesai_num']; @endphp Permohonan</span>
              </div>
              @if($user->jabatan != "JABATAN TEKNOLOGI MAKLUMAT")
              <a href="{{route('senarai.status',['status'=> 'SELESAI'])}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @else
              <a href="{{route('Adminsenarai.status',['status'=> 'SELESAI'])}}" class="small-box-footer"><ion-icon style="font-size:24px" name="arrow-redo-circle-outline"></ion-icon></a>
              @endif
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @php //echo $_SESSION['jabatan'];  @endphp
      <!-- Default box -->
      <center>
      <div class="card card-solid" style="width:99%; height:380px; text-align:center;">
        <div style="display:flex">
            <div style="width:50%; height:380px; padding-top:10px; padding-bottom:10px; border-right:groove;">
                <img style="width:95%; height:355px; border-radius: 5px; border:3px groove; box-shadow:8px 5px #cfcfcf; opacity: .8"
                src="{{ asset('dist/img/mpk.jpg') }}">
            </div>
            <div style="width:50%; padding:10px;">
                <div class="card bg-light" style="height:360px">
                <div class="card-header text-muted border-bottom-0">
                  Sistem i-KiLaS
                </div>
                <div class="card-body pt-0">
                  <div style="text-align:center;">
                    <div >
                      <h2 class="lead"><b>Sistem Kemaskini Informasi Laman Sesawang<br>Majlis Perbandaran Klang</b></h2>
                      <p class="text-muted text-sm">Sebarang masalah sila hubungi: </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted" style="text-align:left; display:flex;">
                        <div style="width:20%"></div>
                        <div style="width:80%">
                            <li class="small"><i class="fas fa-phone-alt"></i></i></span> Talian Am : 03-33755555</li>
                            <li class="small"><i class="fas fa-phone-alt"></i></span> Talian Jabatan Teknologi Maklumat : 03-33755555 Ext 1110</li>
                            <li class="small"><i class="fas fa-envelope"></i></span> Emel : jtm@mpklang.gov.my</li>
                            <li class="small"><i class="fas fa-fax"></i></span> Faks : 03-3372 0344</li>
                        </div>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <br><p class="small"><i class="fas fa-lg fa-building"></i></span> <b>Alamat:</b><br>
                    MAJLIS PERBANDARAN KLANG, Bangunan Sultan Alam Shah, Jalan Perbandaran, <br>41675 Klang, Selangor Darul Ehsan.</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      </center>


</section>



@endsection


