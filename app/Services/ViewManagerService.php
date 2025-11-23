<?php

namespace Modules\ViewManager\Services;

class ViewManagerService
{
	public function setTheme($theme)
	{
		session(["theme" => $theme]);
		cookie()->queue("theme", $theme, 60 * 24 * 30); // 30 days
	}

	public function setLayout($layout)
	{
		session(["layout" => $layout]);
	}

	public function getThemes()
	{
		return config("viewmanager.themes", []);
	}

	public function getLayouts()
	{
		return config("viewmanager.layouts", []);
	}
}
