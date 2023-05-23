<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\detailtransaksi;
use DateTime;
use DateInterval;
use DatePeriod;
class LabaExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($tgl_awal, $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    //    view($tgl_awal);
        // dd($this->tgl_awal);
    }
    public function view(): View
    {
        $data = detailtransaksi::selectRaw('SUM(modal * jumlah) as modal, created_at, SUM(subtotal) as total, count(id_transaksi) as barang')
        ->whereDate('created_at', '>=', $this->tgl_awal)
        ->whereDate('created_at', '<=', $this->tgl_akhir)
        ->groupBy('created_at')
        ->get();
    //    dd($data);
        return view('pages.laporan.laba',compact('data'));
    }
}
