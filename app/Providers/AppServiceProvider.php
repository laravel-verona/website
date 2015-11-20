<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBladeExtensions();
    }

    /**
     * Estensioni per i templates in Blade.
     *
     * @return void
     */
    protected function registerBladeExtensions()
    {
        Blade::extend(function ($value, $compiler) {
            $value = preg_replace("/@set\('(.*?)'\,(.*)\)/", '<?php $$1 = $2; ?>', $value);

            return $value;
        });
    }
}
