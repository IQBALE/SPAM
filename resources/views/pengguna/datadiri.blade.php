@extends('welcome')

@section('judul', 'Data Diri')

@section('konten')
<section class="breadcrumb-option spad set-bg" data-setbg="img/panacea/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Data Diri</h2>
                    <div class="breadcrumb__links">
                        <a href="/pendaftaran">Home</a>
                        <span>Data Diri</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(count($datadiri) > 0)
<section class="doctor spad">
        <div class="container">
            <div class="doctor__item">
                <div class="row">
                 
                    <div class="col-lg-10 offset-md-1 order-lg-2">
                        @if(session('msg'))
                            <div class="alert alert-success" style="padding: 1.75rem 2.25rem; !important">
                            {{session('msg')}}
                            </div>
                        @endif
                        <!-- DATA -->
                        <div class="alert alert-secondary" role="alert">
                            @foreach($datadiri as $data)
                            <div class="services__details__title">
                                <h3>Data Diri : {{$data->nama_lengkap}}</h3>
                            </div>
                            <div class="services__details__desc">                
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <ul class="services__details__feature">
                                                <li><i class="fa fa-calendar"></i>&nbsp;&nbsp;Tempat, Tanggal Lahir : {{$data->tempat}}, {{\Carbon\Carbon::parse($data->tanggal_lahir)->format('d/m/Y')}}</li>
                                                <li><i class="fa fa-venus-mars"></i>&nbsp;Jenis Kelamin : {{$data->jeniskelamin}}</li>
                                                <li><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;Nomor HP : {{$data->no_hp}}</li>
                                                <li><i class="fa fa-envelope"></i>&nbsp;&nbsp; Email : {{$data->email}}</li>
                                                <li><i class="fa fa-address-card"></i>&nbsp;&nbsp;Alamat : {{$data->alamat}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary site-btn" data-toggle="modal" data-target="#editModal-{{$data->id_diri}}">
                                    Edit
                                    </button>
                            </div>
                            @endforeach
                           
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
</section>
@else
<section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="blog__details__comment">     
                        <div class="services__appoinment">
                        <form action="/add-diri" method="POST">
                            {{ csrf_field() }}
                            <div class="services__title">
                                <h4><img src="img/icons/services-icon.png" alt="">Biodata Data Diri</h4>
                            </div>
                             @if (count($errors) > 0)
                                    <div class="alert alert-danger" style="padding: 1.75rem 2.25rem; !important">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif  

                            @if(Session::has('id_pengguna'))
                                <input type="hidden" name="id_pengguna" value="{{Session::get('id_pengguna')}}">
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" name="nama" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="tempat" placeholder="Tempat">
                                </div>
                                <div class="col-lg-6 col-md-6 datepicker__item">
                                    <input type="text" name="tanggal_lahir" placeholder="Tanggal Lahir" class="datepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <select name="jenis_kelamin"  >
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input type="number" name="nohp" placeholder="Nomor HP">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input type="email" name="email" placeholder="email@gmail.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" name="alamat" placeholder="Alamat">
                                </div>
                            </div>
                            <button type="submit" class="site-btn">Kirim</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endif








@foreach($datadiri as $data)
<div class="modal fade" id="editModal-{{$data->id_diri}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Diri {{$data->nama_lengkap}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/edit-diri" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger" style="padding: 1.75rem 2.25rem; !important">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
        <div class="form-group mb-2">
            <label"> Nama Lengkap</label>
            <input class="form-control" type="hidden" name="id_diri" value="{{$data->id_diri}}">
            @if(Session::has('id_pengguna'))
            <input type="hidden" name="id_pengguna" value="{{Session::get('id_pengguna')}}">
            @endif
            <input class="form-control" type="text" name="nama" value="{{$data->nama_lengkap}}">
            </div>
            <div class="form-group mb-2">
            <label"> Tempat</label>
            <input class="form-control" type="text" name="tempat"  value="{{$data->tempat}}">
            </div>
            <div class="form-group mb-2">
            <label"> Tanggal</label>
            <input class="form-control" type="date" name="tanggal"  value="{{$data->tanggal_lahir}}">
            </div>
            
            <div class="form-group mb-2">
            <label"> No HP</label>
            <input class="form-control" type="text" name="nohp"  value="{{$data->no_hp}}">
            </div>
            <div class="form-group mb-2">
            <label"> Email</label>
            <input class="form-control" type="text" name="email"  value="{{$data->email}}">
            </div>
            <div class="form-group mb-2">
            <label"> Alamat</label>
            <input class="form-control" type="text" name="alamat"  value="{{$data->alamat}}">
            </div>
            <label"> Jenis Kelamin</label>
            <div class="form-group mb-2">
                <select  name="jenis_kelamin" >
                    <option value="{{$data->jeniskelamin}}">{{$data->jeniskelamin}}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>  
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@endsection