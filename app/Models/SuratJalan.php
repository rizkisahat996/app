<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'pelanggan_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailJalan::class);
    }
}
