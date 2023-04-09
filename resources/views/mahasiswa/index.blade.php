@extends('layouts.app')
@section('content') 
<div class="container">
    <h3>Daftar Mahasiswa <a href="{{ url('mahasiswa/create') }}">Tambah Data</a></h3>
    
    <table>
        <tr>
            <td>NIM</td> 
            <td>NAMA</td>
            <td>JURUSAN</td>
            <td>ALAMAT</td>
            <td>EDIT</td>
        </tr>
        @foreach($rows as $row)
        <tr>
        <td>{{ $row->mhsw_nim }}</td>
        <td>{{ $row->mhsw_nama }}</td>
        <td>{{ $row->mhsw_jurusan }}</td>
        <td>{{ $row->mhsw_alamat }}</td>
        <td><a href="{{ url('mahasiswa/' . $row->mhsw_id . '/edit') }}">Edit</a></td>
        </tr>
        @endforeach
        </table>
</div>
@endsection
