@extends('layouts/app')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
    
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Table</h1>
                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sisfo Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('departemen.create') }}">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Karyawan</th>
                                            <th>Gaji Karyawan</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Departemen</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($karyawan as $karyawan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $karyawan->nip }}</td>
                                            <td>{{ $karyawan->nama_karyawan }}</td>
                                            <td>{{ $karyawan->gaji_karyawan }}</td>
                                            <td>{{ $karyawan->alamat }}</td>
                                            <td>{{ $karyawan->jenis_kelamin }}</td>
                                            <td>{{ $karyawan->departemen->nama_departemen }}</td>
                                            <td><a class="btn btn-primary btn-sm" href="{{ url('karyawan/' . $karyawan->nip . '/edit') }}">Edit</a>
                                            <form action="{{ url('karyawan/' . $karyawan->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?')">Delete</button>
                                            </form>
                                        </td>
                                        </tr>
                                        @endforeach
                                         
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
@endsection
            <!-- End of Main Content -->

            <!-- Footer -->
 
            <!-- End of Footer -->

        
