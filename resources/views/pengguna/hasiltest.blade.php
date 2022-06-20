@extends('welcome')

@section('judul', 'Hasil Test')

@section('konten')
<section class="breadcrumb-option spad set-bg" data-setbg="img/panacea/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Hasil Test</h2>
                    <div class="breadcrumb__links">
                        <a href="/pendaftaran">Home</a>
                        <span>Hasil Test</span>
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
                    <div class="col-lg-12 col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th> 
                            <th scope="col">Nama File</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>    
                        <tbody>
                        @foreach($hasiltest as $data)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_file}}</td>
                            <td>                            
                            <a href="/view-hasil-{{$data->id_hasil}}" class="btn btn-primary" >Lihat &nbsp;<i class="fas fa-fw fa-file-pdf"></i></a> 
                            <a href="/download/{{$data->nama_file}}" class="btn btn-success" > Download &nbsp;<i class="fas fa-fw fa-download" ></i></a>               
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

@endsection
