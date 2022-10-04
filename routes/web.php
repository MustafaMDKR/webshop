<?php

use App\Controllers\HomeController;
use Dash\Http\Route;

Route::get('/', [HomeController::class, 'index']);