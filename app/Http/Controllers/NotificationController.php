<?php

namespace Modules\ViewManager\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth")->only(["show"]);
	}

	/**
	 * Display a listing of the resource.
	 */
	public function show(Request $request)
	{
		$userNotif = \Auth::user()->notifications;
		return view("viewmanager::pages.notifications.show", compact("userNotif"));
	}
}
