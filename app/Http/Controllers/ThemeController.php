<?php

namespace Modules\ViewManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ThemeController extends Controller
{
	public function setTheme(Request $request)
	{
		$theme = $request->input("theme");
		app("viewmanager")->setTheme($theme);

		return response()->json(["success" => true]);
	}

	public function setLayout(Request $request)
	{
		$layout = $request->input("layout");
		app("viewmanager")->setLayout($layout);

		return response()->json(["success" => true]);
	}
}
