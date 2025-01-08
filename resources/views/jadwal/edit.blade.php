@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Jadwal Kereta</h2>
        
        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nama_kereta">Nama Kereta</label>
                <input type="text" class="form-control" id="nama_kereta" name="nama_kereta" value="{{ old('nama_kereta', $jadwal->nama_kereta) }}" required>
            </div>
            
            <div class="form-group">
                <label for="stasiun_awal">Stasiun Awal</label>
                <input type="text" class="form-control" id="stasiun_awal" name="stasiun_awal" value="{{ old('stasiun_awal', $jadwal->stasiun_awal) }}" required>
            </div>
            
            <div class="form-group">
                <label for="stasiun_tujuan">Stasiun Tujuan</label>
                <input type="text" class="form-control" id="stasiun_tujuan" name="stasiun_tujuan" value="{{ old('stasiun_tujuan', $jadwal->stasiun_tujuan) }}" required>
            </div>
            
            <div class="form-group">
                <label for="waktu_keberangkatan">Waktu Keberangkatan</label>
                <input type="time" class="form-control" id="waktu_keberangkatan" name="waktu_keberangkatan" value="{{ old('waktu_keberangkatan', $jadwal->waktu_keberangkatan) }}" required>
            </div>
            
            <div class="form-group">
                <label for="waktu_kedatangan">Waktu Kedatangan</label>
                <input type="time" class="form-control" id="waktu_kedatangan" name="waktu_kedatangan" value="{{ old('waktu_kedatangan', $jadwal->waktu_kedatangan) }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
