<?php

use App\Http\Controllers\Meta\AdsController;
use App\Http\Controllers\Meta\FanPageController;
use Illuminate\Support\Facades\Route;

Route::get('ad_account', [AdsController::class, 'getAdAccount']);
Route::get('ad_accounts', [AdsController::class, 'getAdAccounts']);
Route::get('spend_account', [AdsController::class, 'getSpendAccount']);

Route::get('fan_pages', [FanPageController::class, 'getFanPages']);
Route::get('fan_page', [FanPageController::class, 'getFanPage']);