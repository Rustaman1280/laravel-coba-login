@extends('layouts/app')
@section('content')
@if ($errors->any())
@foreach($errors->all() as $err)
<p class="text-danger">{{ $err }}</p>
@endforeach
@endif

<form action="{{ url('departemen/' . $data->kodedepartemen) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Formulir Edit Departemen</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Departemen</label>
                        <input type="text" class="form-control" value="{{ $data->nama_departemen }}" name="nama_departemen" required>
                    </div>
                    
                 </div>
                 
                 <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            
            </div>
        </div>
    </div>
</form>

@endsection