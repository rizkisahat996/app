<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $incrementing = false;
    public function relasi(){
        return $this->hasMany('App\Models\detailtransaksi', 'id_transaksi');
    }

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'pelanggan_id');
    }
}
