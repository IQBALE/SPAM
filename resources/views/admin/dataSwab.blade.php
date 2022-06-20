@extends('admin.adminMain')

@section('judul', 'Data Swab')

@section('konten')

<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data SWAB</h6>
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
                                            <th>Nama </th>
                                            <th>Tanggal Swab</th>
                                            <th>Kode Pendaftaran</th>                   
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($swab as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->nama_lengkap}}</td>
                                            <td>{{\Carbon\Carbon::parse($data->tanggal_swab)->format('d/m/Y')}}</td>
                                            <td>{{$data->kode_pendaftaran}}</td>
                                            <td>
                                            <button type="button" class="btn btn-warning"><i class="fas fa-fw fa-edit" data-bs-toggle="modal" data-bs-target="#editModal-{{$data->kode_pendaftaran}}"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash" data-bs-toggle="modal" data-bs-target="#hapusModal-{{$data->kode_pendaftaran}}"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@foreach($swab as $data)
<div class="modal fade" id="editModal-{{$data->kode_pendaftaran}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data SWAB {{$data->nama_lengkap}} </h5>
        </div>
        <form action="/update-swab" method="POST">
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
            <label"> Tanggal Berobat</label>
             <input class="form-control" type="hidden" name="id_pendaftaran" value="{{$data->id_pendaftaran}}">
             <input class="form-control" type="hidden" name="kode_pendaftaran" value="{{$data->kode_pendaftaran}}">
            
             <input class="form-control" type="date" name="tanggal" value="{{$data->tanggal_swab}}">
           </div>
            <div class="form-group mb-2">
            <label"> Kode Pendaftaran</label>
            <input class="form-control" type="text" name="dummy_code"  value="{{$data->kode_pendaftaran}}" disabled>
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

<div class="modal fade" id="hapusModal-{{$data->kode_pendaftaran}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            </div>
            <div class="modal-body">Apakah yakin ingin menghapus Data Swab {{$data->nama_lengkap}} ? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/hapus-swab/{{$data->kode_pendaftaran}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

