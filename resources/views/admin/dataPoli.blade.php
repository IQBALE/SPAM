@extends('admin.adminMain')

@section('judul', 'Data Poli')

@section('konten')

<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Poli</h6>
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
                                            <th>Nama Poli</th>
                                            <th>Jadwal Poli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($polis as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->nama_poli}}</td>
                                            <td>{{$data->jadwal_poli}}</td>
                                            <td>
                                            <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editModal-{{$data->id_poli}}" ><i class="fas fa-fw fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#hapusModal-{{$data->id_poli}}" ><i class="fas fa-fw fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
@foreach($polis as $data)
<div class="modal fade" id="editModal-{{$data->id_poli}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data {{$data->nama_poli}} </h5>
        </div>
        <form action="/update-poli" method="POST">
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
            <label"> Nama Poli</label>
            <input class="form-control" type="hidden" name="id_admin" value="{{$data->id_poli}}">
            <input class="form-control" type="text" name="nama_poli" value="{{$data->nama_poli}}">
            </div>
            <div class="form-group mb-2">
            <label"> Jadwal Poli</label>
            <input class="form-control" type="text" name="jadwal"  value="{{$data->jadwal_poli}}">
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

<div class="modal fade" id="hapusModal-{{$data->id_poli}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            </div>
            <div class="modal-body">Apakah yakin ingin menghapus data poli {{$data->nama_poli}} ? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/hapus-poli/{{$data->id_poli}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

