<?php

use Illuminate\Support\Facades\Route;
use Modules\ViewManager\Http\Controllers\ThemeController;
use Modules\ViewManager\Http\Controllers\DashboardController;
use Modules\ViewManager\Http\Controllers\ProfileController;
use Modules\ViewManager\Http\Controllers\NotificationController;

Route::middleware(["web", "auth"])->group(function () {
	Route::get("/dashboard", [DashboardController::class, "index"])->name(
		"dashboard"
	);
});

Route::name("ViewManager.")->group(function () {
	Route::prefix("notifications")
		->name("notifications.")
		->group(function () {
			Route::get("show", [NotificationController::class, "show"])->name("show");
		});
	Route::prefix("theme")->group(function () {
		Route::post("/set", [ThemeController::class, "setTheme"])->name(
			"theme.set"
		);
		Route::post("/layout", [ThemeController::class, "setLayout"])->name(
			"layout.set"
		);
	});
});
