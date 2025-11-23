<?php

if (!function_exists("theme_manager")) {
	function theme_manager()
	{
		return app("theme.manager");
	}
}

if (!function_exists("theme_view")) {
	function theme_view($view, $data = [])
	{
		return theme_manager()->themeView($view, $data);
	}
}

if (!function_exists("theme_asset")) {
	function theme_asset($path)
	{
		return asset(theme_manager()->getAssetsPath($path));
	}
}

if (!function_exists("theme_layout")) {
	function theme_layout()
	{
		return theme_manager()->getLayoutPath();
	}
}

if (!function_exists("format_property_value")) {
	function format_property_value($value, $maxLength = 30)
	{
		if (is_array($value)) {
			return json_encode($value);
		}

		$stringValue = (string) $value;

		if (strlen($stringValue) > $maxLength) {
			return substr($stringValue, 0, $maxLength) . "...";
		}

		return $stringValue;
	}
}
