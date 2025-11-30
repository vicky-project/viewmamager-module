<?php
namespace Modules\ViewManager\Installations;

use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Artisan;

class PostInstallation
{
	public function handle(string $moduleName)
	{
		try {
			$module = Module::find($moduleName);
			$module->enable();

			Artisan::call("view:install", ["--force" => true]);
			Artisan::call("make:notifications-table");
			Artisan::call("migrate", ["--force" => true]);
		} catch (\Exception $e) {
			logger()->error(
				"Failed to running post installation of view mamager: " .
					$e->getMessage()
			);

			throw $e;
		}
	}
}
