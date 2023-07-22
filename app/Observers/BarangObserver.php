<?php

namespace App\Observers;

use App\Models\barang;

class BarangObserver
{
    /**
     * Handle the barang "created" event.
     */
    public function created(barang $barang): void
    {
        // $berat = $barang->stok;

        // $barang->berat = $berat * 5;
    }

    /**
     * Handle the barang "updated" event.
     */
    public function updated(barang $barang): void
    {
        // $berat = $barang->stok;

        // $barang->berat = $berat * 5;
    }

    /**
     * Handle the barang "deleted" event.
     */
    public function deleted(barang $barang): void
    {
        //
    }

    /**
     * Handle the barang "restored" event.
     */
    public function restored(barang $barang): void
    {
        //
    }

    /**
     * Handle the barang "force deleted" event.
     */
    public function forceDeleted(barang $barang): void
    {
        //
    }
}
