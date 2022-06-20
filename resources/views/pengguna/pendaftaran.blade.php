@extends('welcome')

@section('judul', 'Pendaftaran')

@section('konten')
<section class="breadcrumb-option spad set-bg" data-setbg="img/panacea/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Pendaftaran</h2>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Pendaftaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="blog__details__comment">  
                       
                        <div class="services__appoinment">
                            <!-- <div class="p-5"> -->
                             @if(session('msg'))
                                        <div class="alert alert-success" style="padding: 1.75rem 2.25rem; !important">
                                        {{session('msg')}}
                                        </div>
                                    @endif
                            @if (count($errors) > 0)
                                    <div class="alert alert-danger" style="padding: 1.75rem 2.25rem; !important">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif   
                            <!-- </div> -->
                            <form action="/add-pendaftaran" method="POST">
                            {{ csrf_field() }}
                            <div class="services__title">
                                <h4><img src="img/icons/services-icon.png" alt=""> Data Diri</h4>
                            </div>
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
                                    <select name="jenis_kelamin"  >
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                <select name="status" >
                                        <option value="">Status</option>
                                        <option value="pelajar/mahasiswa">Pelajar/Mahasiswa</option>
                                        <option value="berkerja">Berkerja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" name="tempat" placeholder="Tempat">
                                </div>
                                <div class="col-lg-4 col-md-4 datepicker__item">
                                    <input type="text" name="tanggal_lahir" placeholder="Tanggal Lahir" class="datepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <input type="number" name="usia"  placeholder="Usia" maxlength="3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <input type="number" name="nohp" placeholder="Nomor HP">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <select  name="agama">
                                        <option value="">Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" name="alamat" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="pekerjaan" placeholder="Pekerjaan">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="perusahaan" placeholder="Perusahaan">
                                </div>
                            </div>
                            <div class="services__title">
                                <h4><img src="img/icons/services-icon.png" alt="">Data Keluarga</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <input type="text" name="nama_keluarga" placeholder="Nama Keluarga">
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <input type="text" name="pekerjaan_keluarga" placeholder="Pekerjaan Keluarga">
                                </div>
                            </div>
                            <div class="services__title">
                                <h4><img src="img/icons/services-icon.png" alt="">Data Pelayanan</h4>
                            </div>
                            <div class="row">
                            <div class="col-lg-12 col-md-12">
                                    <select name="jenis_pelayanan" >
                                        <option value="">Jenis Pendaftaran</option>
                                        <option value="berobat">Berobat</option>
                                        <option value="swab">Swab Test</option>
                                    </select>
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

@endsection