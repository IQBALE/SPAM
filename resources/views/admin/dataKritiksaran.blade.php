@extends('admin.adminMain')

@section('judul', 'Data Admin')

@section('konten')

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kritik Saran</h6>
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
                            <th>Kritik</th>
                            <th>Saran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($kritiksaran as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->kritik}}</td>
                            <td>{{$data->saran}}</td>
                            <td>
                            
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal-{{$data->id_kritik}}"><i class="fas fa-fw fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@foreach($kritiksaran as $data)

<div class="modal fade" id="hapusModal-{{$data->id_kritik}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            </div>
            <div class="modal-body">Apakah yakin ingin menghapus kritik " {{$data->kritik}} " dan saran " {{$data->saran}} " ? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/hapus-kritiksaran/{{$data->id_kritik}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

