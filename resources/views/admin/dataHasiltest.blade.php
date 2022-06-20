@extends('admin.adminMain')

@section('judul', 'Data Admin')

@section('konten')

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Hasil Test</h6>
        </div>
        <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger" style="padding: 1.75rem 2.25rem; !important">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif  
        <form action="/add-hasiltest" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group"><label>ID Pasien - Nama Pasien</label>
                <select name="nama_pasien" class="form-control" > 
                    <option value="">-PILIH-</option>
                    @foreach($dp as $gdp)
                        <option value="{{$gdp->id_pengguna}}">{{$gdp->id_pengguna}} - {{$gdp->nama_lengkap}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group"><label>ID - Pendaftaran</label>
                <select name="id_pendaftaran" class="form-control" > 
                    <option value="">-PILIH-</option>
                    @foreach($dp as $gdp)
                        <option value="{{$gdp->id_pendaftaran}}">{{$gdp->id_pendaftaran}} - {{$gdp->nama_lengkap}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group"><label>Pilih File</label>
                <input name="nama_file" class="form-control"  type="file">
            </div>
                <button style="float:right;" type="submit" class="btn btn-success">Tambah</button>
        </form>
        </div>
    </div>  
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Hasil Test</h6>
        </div>
        <div class="card-body">
         @if(session('msg'))
            <div class="alert alert-success" style="padding: 1.75rem 2.25rem; !important">
            {{session('msg')}}
            </div>
        @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID-Pendaftaran</th>
                            <th>Pasien</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($hasiltest as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->id_pendaftaran}}</td>
                            <td>{{$data->nama_lengkap}}</td>
                            <td>{{$data->nama_file}}</td>
                            <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#detailModal-{{$data->id_hasil}}"><i class="fas fa-fw fa-file-pdf" ></i></button>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"  data-bs-target="#editModal-{{$data->id_hasil}}"><i class="fas fa-fw fa-edit" ></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal-{{$data->id_hasil}}"><i class="fas fa-fw fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach($hasiltest as $data)
<div class="modal fade" id="detailModal-{{$data->id_hasil}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cek PDF - {{$data->nama_file}} </h5>
        </div>
        <div class="modal-body">
           <iframe src="{{url('storage/data_file/'.$data->nama_file)}}" style="height:600px; width:468px;"></iframe> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="editModal-{{$data->id_hasil}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Hasil Test </h5>
        </div>
        <form action="/update-hasiltest" method="POST" enctype="multipart/form-data">
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
            <label"> Nama</label>
            <input class="form-control" type="hidden" name="id_hasil" value="{{$data->id_hasil}}">
            <input class="form-control" type="hidden" name="id_pengguna" value="{{$data->id_pengguna}}">
            <input class="form-control" type="hidden" name="id_pendaftaran" value="{{$data->id_pendaftaran}}">
            <input class="form-control" type="text" name="nama" value="{{$data->nama_lengkap}}" disabled>
            </div>
            <div class="form-group mb-2">
                <label">File</label>
                <input name="nama_file" class="form-control"  type="file">
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Update</button>
        </div>
        </form>
    </div>
    </div>
</div>
<div class="modal fade" id="hapusModal-{{$data->id_hasil}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Hapus File Hasil Test {{$data->nama_lengkap}} </h5>
            </div>
            <div class="modal-body">Apakah yakin ingin menghapus file {{$data->nama_file}} ?  </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/hapus-hasiltest/{{$data->id_hasil}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

