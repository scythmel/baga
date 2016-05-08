<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

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
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
                
            $this->app->bind("App\\Services\\ILoginService","App\\Services\\LoginService");
        
            $this->app->bind("App\\Repositories\\IItemRepository","App\\Repositories\\ItemRepository");
            $this->app->bind("App\\Repositories\\IOutletRepository","App\\Repositories\\OutletRepository");
            $this->app->bind("App\\Repositories\\IInventoryRepository","App\\Repositories\\InventoryRepository");
	}

}
