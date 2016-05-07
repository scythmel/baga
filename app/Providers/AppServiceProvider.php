<?php

namespace App\Providers;

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
        $this->app->bind("App\\Services\\ILoginService","App\\Services\\LoginService");
        
        $this->app->bind("App\\Repositories\\IItemRepository","App\\Repositories\\ItemRepository");
        $this->app->bind("App\\Repositories\\IOutletRepository","App\\Repositories\\OutletRepository");
        $this->app->bind("App\\Repositories\\IInventoryRepository","App\\Repositories\\InventoryRepository");
    }
}
