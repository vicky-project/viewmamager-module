<?php

namespace Modules\ViewManager\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\ViewManager\Services\ThemeManager;

class ApplyTheme
{
	protected $themeManager;

	public function __construct(ThemeManager $themeManager)
	{
		$this->themeManager = $themeManager;
	}

	public function handle(Request $request, Closure $next, $theme = null)
	{
		// Apply specific theme if provided
		if ($theme) {
			$this->themeManager->setTheme($theme);
		}

		// Auto-detect admin routes
		if ($request->is("admin/*") || $request->is("*/admin/*")) {
			$this->themeManager->setTheme("admin");
		}

		return $next($request);
	}
}
