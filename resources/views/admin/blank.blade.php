@extends('admin.admin')

@section('judul', 'Blank')

@section('konten')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna</h6>
        </div>
        <div class="card-body">
        <form>
            <div class="form-group"><label for="exampleFormControlInput1">Email address</label><input class="form-control" id="exampleFormControlInput1" type="email" placeholder="name@example.com"></div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label><select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Example multiple select</label><select class="form-control" id="exampleFormControlSelect2" multiple="">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group"><label for="exampleFormControlTextarea1">Example textarea</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
        </form>
        </div>
    </div>  
</div>

@endsection

