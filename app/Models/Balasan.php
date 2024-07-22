<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    use HasFactory;

    public function tiket(){
        return $this->hasMany(Tiket::class, 'id_tiket');
    }

    protected $fillable=[ 'email_pengirim', 'balasan', 'id_tiket', 'tanggal' ];
}
