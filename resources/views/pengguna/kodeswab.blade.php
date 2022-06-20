@extends('welcome')

@section('judul', 'Kode SWAB')

@section('konten')

<section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="blog__details__comment">     
                        <div class="services__appoinment">
                            
                            <div class="row">   
                                <div class="col-lg-12 col-md-12 datepicker__item">
                                    <div class="alert alert-warning" role="alert">
                                    Kode Harap Di Unduh atau di Screenshot
                                    </div>
                                </div>
                            </div>      
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="section-title">
                                    <span>Kode Pendaftaran SWAB ANDA</span>
                                    
                                        <h2>{{$kode['kode_pendaftaran']}}</h2>
                                    </div>
                                </div>
                            </div>  
                            
                            <a href="/download-kodeswab" type="submit" class="site-btn">UNDUH</a>
                            <br>
                            <a href="/pendaftaran" type="submit" class="site-btn">Kembali</a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
