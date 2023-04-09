<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $rows = Mahasiswa::all();
        return view('mahasiswa.index', compact('rows'));
    }

    public function create()
    {
        return view('mahasiswa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['mhsw_nim' => 'bail|required|unique:tb_mhsw', 'mhsw_nama' => 'required'],
        [
            'mhsw_nim.required' => 'NIM wajib diisi',
            'mhsw_nim.unique' => 'Nama Tahun sudah ada',
            'mhsw_nama.required' => 'Nama wajib diisi'
        ]);

        Mahasiswa::create ([
            'mhsw_nim' => $request->mhsw_nim,
            'mhsw_nama' => $request->mhsw_nama,
            'mhsw_jurusan' => $request->mhsw_jurusan,
            'mhsw_alamat' => $request->mhsw_alamat
    ]);

        return redirect('mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show (string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mhsw_nim' => 'bail|required|unique:tb_mhsw',
            'mhsw_nama' => 'required'
        ],
        [
            'mhsw_nim.required' => 'NIM wajib diisi',
            'mhsw_nim.unique' => 'Nama Tahun sudah ada',
            'mhsw_nama.required' => 'Nama wajib diisi'
        ]);
        $row = Mahasiswa::findOrFail($id);
        $row->update([
            'mhsw_nim' => $request->mhsw_nim,
            'mhsw_nama' => $request->mhsw_nama,
            'mhsw_jurusan' => $request->mhsw_jurusan,
            'mhsw_alamat' => $request->mhsw_alamat
        ]);
        
        return redirect('mahasiswa'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Mahasiswa::findOrFail($id);
        $row->delete();

        return redirect('mahasiswa');
    }
}
