<?php

namespace App\Providers;

use App\Models\barang;
use App\Models\transaksi;
use App\Observers\BarangObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\AlertStok;
use Illuminate\Support\Facades\Schema;
use App\Models\TransactionLog;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('alert-stok', AlertStok::class);
        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });
        \Blade::directive('terbilang', function ($number) {
            return "<?php echo terbilang($number); ?>";
        });
        barang::observe(BarangObserver::class);
        Schema::defaultStringLength(191);

        transaksi::created(function ($transaction) {
            $items = DB::table('detailtransaksis')
                ->where('id_transaksi', $transaction->id)
                ->get();
    
            foreach ($items as $pivot) {
                $item = barang::find($pivot->item_id);
                $beforeQuantity = $item->berat;
    
                $item->berat -= $pivot->jumlah;
                $item->save();
    
                $logData = [
                    'kode' => $transaction->kode_faktur,
                    'kode_barang' => $item->id,
                    'sebelum' => $beforeQuantity,
                    'sesudah' => $item->berat,
                    'keluar' => $pivot->jumlah,
                ];
    
                TransactionLog::create($logData);
                Paginator::useBootstrap();
            }
        });
    }
}
