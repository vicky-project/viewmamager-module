<?php

namespace Modules\ViewManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth");
	}

	public function index()
	{
		return view("viewmanager::dashboard");
	}
}
