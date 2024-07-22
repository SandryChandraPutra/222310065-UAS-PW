<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    public function admin(){
        return $this->hasMany(Admin::class);
    }

    public function tiket(){
        return $this->hasMany(Tiket::class, 'id_divisi');
    }
}
