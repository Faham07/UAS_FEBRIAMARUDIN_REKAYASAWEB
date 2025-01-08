<?php

namespace App\Http\Controllers;

use App\Models\JadwalKereta;
use Illuminate\Http\Request;

class JadwalKeretaController extends Controller
{
    // Menampilkan semua jadwal kereta
    public function index()
    {
        $jadwals = JadwalKereta::all();  // Ambil semua data jadwal kereta
        return view('jadwal.index', compact('jadwals'));  // Kirim ke view
    }

    // Menampilkan form untuk menambah jadwal kereta
    public function create()
    {
        return view('jadwal.create');  // Tampilkan form create
    }

    // Menyimpan data jadwal kereta
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kereta' => 'required',
            'stasiun_awal' => 'required',
            'stasiun_tujuan' => 'required',
            'waktu_keberangkatan' => 'required|date_format:H:i',
            'waktu_kedatangan' => 'required|date_format:H:i',
        ]);

        // Menyimpan data jadwal kereta yang valid
        JadwalKereta::create([
            'nama_kereta' => $request->nama_kereta,
            'stasiun_awal' => $request->stasiun_awal,
            'stasiun_tujuan' => $request->stasiun_tujuan,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,
            'waktu_kedatangan' => $request->waktu_kedatangan,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal Kereta berhasil ditambahkan');
    }

    // Menampilkan form untuk edit jadwal kereta
    public function edit($id)
    {
        $jadwal = JadwalKereta::findOrFail($id);  // Temukan jadwal berdasarkan ID
        return view('jadwal.edit', compact('jadwal'));  // Kirim data jadwal ke view edit
    }

    // Memperbarui jadwal kereta
    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_kereta' => 'required',
        'stasiun_awal' => 'required',
        'stasiun_tujuan' => 'required',
        'waktu_keberangkatan' => 'required|date_format:H:i',
        'waktu_kedatangan' => 'required|date_format:H:i',
    ]);

   // Cari jadwal berdasarkan ID dan update
    $jadwal = JadwalKereta::findOrFail($id);
    $jadwal->update([
        'nama_kereta' => $request->nama_kereta,
        'stasiun_awal' => $request->stasiun_awal,
        'stasiun_tujuan' => $request->stasiun_tujuan,
        'waktu_keberangkatan' => $request->waktu_keberangkatan,
        'waktu_kedatangan' => $request->waktu_kedatangan,
    ]);

    // Redirect ke halaman daftar setelah update berhasil
    return redirect()->route('jadwal.index');
}
    // Menghapus jadwal kereta
    public function destroy($id)
    {
        $jadwal = JadwalKereta::findOrFail($id);  // Temukan jadwal berdasarkan ID
        $jadwal->delete();  // Hapus data jadwal
        return redirect()->route('jadwal.index')->with('success', 'Jadwal Kereta berhasil dihapus');
    }
}
