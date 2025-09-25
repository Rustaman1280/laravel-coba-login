@extends('layouts/app')
@section('content')

<form action="{{ route('karyawan.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Formulir Tambah Karyawan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">NIP</label>
                        <input type="text" class="form-control" value="{{ old('nip') }}" name="nip" required>

                    </div>
                    
                 </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Karyawan</label>
                        <input type="text" class="form-control" value="{{ old('nama_karyawan') }}" name="nama_karyawan" required>

                    </div>
                    
                 </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Gaji Karyawan</label>
                        <input type="text" class="form-control" value="{{ old('gaji') }}" name="gaji_karyawan" required>
                
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