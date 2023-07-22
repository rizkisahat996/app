<?php

namespace App\Providers;

use App\Models\barang;
use App\Observers\BarangObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\AlertStok;
use Illuminate\Support\Facades\Schema;

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
    }
}
