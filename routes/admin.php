<?php

use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRelationController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin/dashboard'], function(){
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/users',[UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create',[UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users',[UserController::class, 'store'])->name('admin.users.store');
    Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('admin.users.destroy');
    
    Route::get('/buyers', [BuyerController::class, 'index'])->name('admin.buyers.index');
    
    Route::get('/sellers', [UserController::class, 'sellers'])->name('admin.sellers.index');
    Route::get('/supports', [UserController::class, 'supports'])->name('admin.supports.index');

    Route::get('/teams', [TeamController::class, 'index'])->name('admin.teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('admin.teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('admin.teams.store');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('admin.teams.destroy');
});
