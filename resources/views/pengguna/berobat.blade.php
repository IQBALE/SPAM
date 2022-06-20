@extends('welcome')

@section('judul', 'Berobat')

@section('konten')

<section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="blog__details__comment">     
                        <div class="services__appoinment">
                            <form action="/add-berobat" method="POST">
                            {{ csrf_field() }}
                            <div class="services__title">
                                <h4><img src="img/icons/services-icon.png" alt="">Data Berobat</h4>
                            </div>
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
                            <!-- <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <select name="poli"  >
                                        <option value=""> - PILIH POLI - </option>
                                        @foreach($dp as $gdp)
                                            <option value="{{$gdp->id_poli}}">{{$gdp->nama_poli}}</option>
                                        @endforeach   
                                    </select>
                                </div>
                            </div>  -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <select name="poli"  id="poli_id">
                                        <option value=""> - PILIH POLI - </option>
                                        @foreach($dp as $gdp)
                                            <option value="{{$gdp->id_poli}}">{{$gdp->nama_poli}}</option>
                                        @endforeach   
                                    </select>
                                    <div id="poli_area"></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-lg-12 col-md-12 datepicker__item">
                                    <input type="text" name="tanggal" placeholder="Tanggal Berobat" class="datepicker">
                                    <i class="fa fa-calendar"></i>
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