<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $karyawan = Karyawan::with('departemen')->get();
        return view('karyawan.index', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Include departemen list so the form can attach karyawan to a departemen.
        $departemen = Departemen::all();
        return view('karyawan.create', compact('departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nip' => 'required|unique:karyawan,nip',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'departemen_id' => 'required|exists:departemen,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ],[
            'nip.required' => 'NIP harus diisi.',
            'nama_karyawan.required' => 'Nama Karyawan harus diisi.',
            'gaji_karyawan.required' => 'Gaji Karyawan harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'jenis_kelamin.required' => 'Jenis Kelamin harus dipilih.',
            'departemen_id.required' => 'Departemen harus dipilih.',
            'departemen_id.exists' => 'Departemen tidak ditemukan.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            
        ]);

        $validated['foto'] = '';

        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = now()->format('ymdhis') . '.' . $foto_file->extension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $validated['foto'] = $foto_nama;
        }

        Karyawan::create($validated);
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $departemen = Departemen::all();
        return view('karyawan.edit', [
            'data' => $karyawan,
            'departemen' => $departemen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:karyawan,nip,' . $karyawan->id,
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'departemen_id' => 'required|exists:departemen,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nip.required' => 'NIP harus diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'nama_karyawan.required' => 'Nama Karyawan harus diisi.',
            'gaji_karyawan.required' => 'Gaji Karyawan harus diisi.',
            'gaji_karyawan.numeric' => 'Gaji Karyawan harus berupa angka.',
            'alamat.required' => 'Alamat harus diisi.',
            'jenis_kelamin.required' => 'Jenis Kelamin harus dipilih.',
            'departemen_id.required' => 'Departemen harus dipilih.',
            'departemen_id.exists' => 'Departemen tidak ditemukan.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
        ]);

        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = now()->format('ymdhis') . '.' . $foto_file->extension();
            $foto_file->move(public_path('foto'), $foto_nama);

            if ($karyawan->foto) {
                File::delete(public_path('foto') . '/' . $karyawan->foto);
            }

            $validated['foto'] = $foto_nama;
        }

        $karyawan->update($validated);
        $data['foto'] = $foto_nama;
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        //
        $data = Karyawan::where('id', $karyawan->id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        Karyawan::where('id',$karyawan->id)->delete();
        return redirect('karyawan')->with('success', 'Karyawan berhasil dihapus.');
    }
}
