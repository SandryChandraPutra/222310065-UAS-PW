<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tikets';
    public function divisi(){
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function balasan(){
        return $this->belongsTo(Balasan::class);
    }

    protected $fillable = ['id_mahasiswa','judul_tiket', 'deskripsi', 'id_divisi', 'attachment','status', 'priority', 'is_active'];

}
