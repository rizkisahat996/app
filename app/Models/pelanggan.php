<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
    public function surat_jalan()
    {
        return $this->hasMany(SuratJalan::class);
    }
}
