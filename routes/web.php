<?php

use Illuminate\Support\Facades\Route;
use Modules\ViewManager\Http\Controllers\ThemeController;
use Modules\ViewManager\Http\Controllers\DashboardController;
use Modules\ViewManager\Http\Controllers\ProfileController;

Route::middleware(["web", "auth"])->group(function () {
	Route::get("/dashboard", [DashboardController::class, "index"])->name(
		"dashboard"
	);
});

Route::prefix("theme")->group(function () {
	Route::post("/set", [ThemeController::class, "setTheme"])->name(
		"viewmanager.theme.set"
	);
	Route::post("/layout", [ThemeController::class, "setLayout"])->name(
		"viewmanager.layout.set"
	);
});
