@extends('layouts/app')
@section('content')

<form action="{{ route('departemen.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Formulir Tambah Departemen</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Departemen</label>
                        <input type="text" class="form-control" value="{{ old('nama_departemen') }}" name="nama_departemen" required>
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