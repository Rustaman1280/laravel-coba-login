@extends('layouts/app')
@section('content')

<form action="{{ route('karyawan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Formulir Edit Karyawan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">NIP</label>
                        <input type="number" class="form-control" value="{{ old('nip', $data->nip) }}" name="nip" required>

                    </div>
                    
                 </div>
                 <div class="card-body">
                    <div class="form-group">
                        <label for="departemen_id">Departemen</label>
                        <select class="form-control" name="departemen_id" id="departemen_id" required>
                            <option value="">Pilih Departemen</option>
                            @foreach ($departemen as $item)
                                <option value="{{ $item->id }}" {{ old('departemen_id', $data->departemen_id) == $item->id ? 'selected' : '' }}>{{ $item->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Karyawan</label>
                        <input type="text" class="form-control" value="{{ old('nama_karyawan', $data->nama_karyawan) }}" name="nama_karyawan" required>

                    </div>
                    
                 </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Gaji Karyawan</label>
                        <input type="number" class="form-control" value="{{ old('gaji_karyawan', $data->gaji_karyawan) }}" name="gaji_karyawan" required>
                
                    </div>
                    
                 </div>

                 <div class="card-body">
                    <div class="form-group">
                        <label for="name">Alamat</label>
                        <textarea class="form-control" name="alamat" required>{{ old('alamat', $data->alamat) }}</textarea>
                
                    </div>
                    
                 </div>
                 <div class="card-body">
                    <div class="form-group">
                        <label for="name">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Pria" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                    </div>
                    
                 </div>
                 @if ($data->foto)
                 <div class="form-group">
                 <img src="{{ asset('foto/' . $data->foto) }}" alt="Foto Karyawan" width="100">
                 </div>
                 @endif
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Upload Foto Karyawan</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">

                    </div>
                 
                 
                 <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            
            </div>
        </div>
    </div>
</form>

@endsection