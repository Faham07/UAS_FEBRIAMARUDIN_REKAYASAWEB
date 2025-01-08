<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKereta extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kereta';  // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'nama_kereta',
        'stasiun_awal',
        'stasiun_tujuan',
        'waktu_keberangkatan',
        'waktu_kedatangan',
    ];
}
