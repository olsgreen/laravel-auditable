<?php namespace Olsgreen\Auditable;

use Illuminate\Support\ServiceProvider;

class AuditableServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['auditable'] = $this->app->share(function($app) {
			return new \Olsgreen\Auditable\Auditable;
		});

		$this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Auditable', '\Olsgreen\Auditable\AuditableFacade');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('auditable');
	}

}