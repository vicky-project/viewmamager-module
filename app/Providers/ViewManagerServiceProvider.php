<?php

namespace Modules\ViewManager\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewManagerServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . "/../../config/config.php", "viewmanager");

		$this->app->singleton("viewmanager", function () {
			return new \Modules\ViewManager\Services\ViewManagerService();
		});
	}

	public function boot()
	{
		$this->registerViews();
		$this->registerViewComposers();
	}

	protected function registerViews()
	{
		$this->loadViewsFrom(__DIR__ . "/../../resources/views", "viewmanager");
	}

	protected function registerViewComposers()
	{
		// Share theme manager with all views
		View::composer("*", function ($view) {
			$theme = session("theme", "light");
			$layout = session("layout", "light");

			$view->with("currentTheme", $theme);
			$view->with("currentLayout", $layout);
		});
	}
}
