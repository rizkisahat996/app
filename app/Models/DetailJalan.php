<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJalan extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function jalan()
    {
        return $this->belongsTo(SuratJalan::class, 'surat_id');
    }

    public function barang()
    {
        return $this->belongsTo(barang::class, 'barang_id');
    }
}
