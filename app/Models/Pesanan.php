<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function paket (){
        return $this->belongsTo(Paket::class);
    }
    public function progress (){
        return $this->hasMany(Progres::class);
    }
}
