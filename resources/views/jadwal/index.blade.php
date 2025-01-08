@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Febri amarudin</h1>
    <h1>Daftar Jadwal Kereta</h1>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kereta</th>
                <th>Stasiun Awal</th>
                <th>Stasiun Tujuan</th>
                <th>Waktu Keberangkatan</th>
                <th>Waktu Kedatangan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <!-- Tombol Login/Logout di pojok kanan -->
            <div class="d-flex">
                @if (Auth::check())
                    <a class="btn btn-danger btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        <tbody>
            @foreach($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->id_jadwal }}</td>
                <td>{{ $jadwal->nama_kereta }}</td>
                <td>{{ $jadwal->stasiun_awal }}</td>
                <td>{{ $jadwal->stasiun_tujuan }}</td>
                <td>{{ $jadwal->waktu_keberangkatan }}</td>
                <td>{{ $jadwal->waktu_kedatangan }}</td>
                <td>
                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif