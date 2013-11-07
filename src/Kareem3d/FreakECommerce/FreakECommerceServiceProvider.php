<?php namespace Kareem3d\FreakECommerce;

use Illuminate\Support\ServiceProvider;
use Kareem3d\Freak\ClientRepository;

class FreakECommerceServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


    public function boot()
    {
        $this->package('kareem3d/ecommerce');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        ClientRepository::register(new ECommerceClient());
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}