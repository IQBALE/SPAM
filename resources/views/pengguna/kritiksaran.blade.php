@extends('welcome')

@section('judul', 'Kritik dan Saran')

@section('konten')
<section class="breadcrumb-option spad set-bg" data-setbg="img/panacea/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Kritik Saran</h2>
                    <div class="breadcrumb__links">
                        <a href="/pendaftaran">Home</a>
                        <span>Kritik Saran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact spad">
        <div class="container">
            <div class="contact__content">
                <div class="row">
                    <div class="col-lg-5 col-md-7">
                        <div class="contact__pic">
                            <img src="img/contact-pic.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="contact__form">
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
                            <form action="/add-kritiksaran" method="POST">
                            {{ csrf_field() }}
                                @if(Session::has('id_pengguna'))
                                <input type="hidden" name="id_pengguna" value="{{Session::get('id_pengguna')}}">
                                @endif
                                <textarea name="kritik" placeholder="Kritik"></textarea>
                                <textarea name="saran" placeholder="Saran"></textarea>
                                <button type="submit" class="site-btn">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection