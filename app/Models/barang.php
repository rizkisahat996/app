<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    public $incrementing = false;
    public function relasi(){
        return $this->hasMany('App\Models\detailtransaksi', 'id_barang');
        return $this->hasMany('App\Models\kategoribarang', 'id_kategori');
    }

    protected static function boot()
    {
        parent::boot();

        // "creating" event will be fired when a new record is being created
        self::creating(function ($item) {
            $item->calculateAndSetWeight();
        });

        // "updating" event will be fired when a record is being updated
        self::updating(function ($item) {
            $item->calculateAndSetWeight();
        });
    }

    // Calculate and set the "berat" attribute based on the "stok" attribute
    public function calculateAndSetWeight()
    {
        // Assuming "stok" and "berat" are attributes of your model
        // and you want to calculate the "berat" as "stok * 5"
        $this->berat = $this->stok * 5;
    }
}
