@extends('admin.adminMain')

@section('judul', 'Data Admin')

@section('konten')

<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
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
                                            <th>ID Pendaftaran</th>
                                            <th>Nama Lengkap</th>
                                            <th>Umur</th>
                                            <th>Jenis Pendaftaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($pendaftarans as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->id_pendaftaran}}</td>
                                            <td>{{$data->nama_lengkap}}</td>
                                            <td>{{$data->umur}}</td>
                                            <td>{{$data->jenis_pendaftaran}}</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal-{{$data->id_pendaftaran}}" ><i class="fas fa-fw fa-search-plus"></i></button>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{$data->id_pendaftaran}}"><i class="fas fa-fw fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal-{{$data->id_pendaftaran}}"><i class="fas fa-fw fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@foreach($pendaftarans as $data)
<!-- DETAIL -->
<div class="modal fade" id="detailModal-{{$data->id_pendaftaran}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data - {{$data->nama_lengkap}} </h5>
        </div>
            <form>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label"> Jenis Kelamin</label>
                        <input class="form-control" type="text"   value="{{$data->jenis_kelamin}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Status</label>
                        <input class="form-control" type="text" value="{{$data->status}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Tempat, Tanggal Lahir</label>
                        <input class="form-control" type="text"value="{{$data->tempat}}, {{\Carbon\Carbon::parse($data->tanggal_lahir)->format('d/m/Y')}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Umur</label>
                        <input class="form-control" type="text"   value="{{$data->umur}}" disabled> 
                    </div>
                    <div class="form-group mb-2">
                        <label"> Alamat</label>
                        <input class="form-control" type="text"  value="{{$data->alamat}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> No HP</label>
                        <input class="form-control" type="text"   value="{{$data->no_hp}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Agama</label>
                        <input class="form-control" type="text" value="{{$data->agama}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Pekerjaan</label>
                        <input class="form-control" type="text"  value="{{$data->pekerjaan}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Perusahaan</label>
                        <input class="form-control" type="text" value="{{$data->perusahaan}}" disabled >
                    </div>
                    <div class="form-group mb-2">
                        <label"> Nama Keluarga</label>
                        <input class="form-control" type="text" value="{{$data->nama_keluarga}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Pekerjaan Keluarga</label>
                        <input class="form-control" type="text" value="{{$data->pekerjaan_keluarga}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Jenis Pendaftaran</label>
                        <input class="form-control" type="text"   value="{{$data->jenis_pendaftaran}}" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
    </div>
    </div>
</div>

<!-- EDIT -->
<div class="modal fade" id="editModal-{{$data->id_pendaftaran}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data - {{$data->nama_lengkap}} </h5>
        </div>
            <form action="/update-pendaftaran" method="POST">
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
                        <input class="form-control" type="hidden" name="id_pendaftaran"  value="{{$data->id_pendaftaran}}">
                        <input class="form-control" type="hidden" name="id_pengguna"  value="{{$data->id_pengguna}}">
                        <input class="form-control" type="text" name="nama"  value="{{$data->nama_lengkap}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="{{$data->jenis_kelamin}}">{{$data->jenis_kelamin}}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Status</label>
                        <input class="form-control" type="text" name="status"  value="{{$data->status}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> Tempat </label>
                        <input class="form-control" type="text" name="tempat" value="{{$data->tempat}}">
                    </div>
                    <div class="form-group mb-2 ">
                        <label">Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> Umur</label>
                        <input class="form-control" type="text" name="umur" value="{{$data->umur}}"> 
                    </div>
                    <div class="form-group mb-2">
                        <label"> Alamat</label>
                        <input class="form-control" type="text" name="alamat" value="{{$data->alamat}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> No HP</label>
                        <input class="form-control" type="text" name="nohp" value="{{$data->no_hp}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> Agama</label>
                        <select class="form-control" name="agama">
                            <option value="{{$data->agama}}">{{$data->agama}}</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label"> Pekerjaan</label>
                        <input class="form-control" type="text" name="pekerjaan" value="{{$data->pekerjaan}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> Perusahaan</label>
                        <input class="form-control" type="text" name="perusahaan" value="{{$data->perusahaan}}" >
                    </div>
                    <div class="form-group mb-2">
                        <label"> Nama Keluarga</label>
                        <input class="form-control" type="text" name="nama_keluarga" value="{{$data->nama_keluarga}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> Pekerjaan Keluarga</label>
                        <input class="form-control" type="text" name="pekerjaan_keluarga" value="{{$data->pekerjaan_keluarga}}">
                    </div>
                    <div class="form-group mb-2">
                        <label"> Jenis Pendaftaran</label>
                        <select class="form-control" name="jenis_pendaftaran">
                                <option value="{{$data->jenis_pendaftaran}}">{{$data->jenis_pendaftaran}}</option>
                                <option value="berobat">Berobat</option>
                                <option value="swab">Swab Test</option>
                            </select>
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

<!-- DELETE -->
<div class="modal fade" id="hapusModal-{{$data->id_pendaftaran}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            </div>
            <div class="modal-body">Apakah yakin ingin menghapus data {{$data->nama_lengkap}} ? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/hapus-pendaftaran/{{$data->id_pendaftaran}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

