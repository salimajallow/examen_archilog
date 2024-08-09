<?php
use Illuminate\Support\Facades\Route;

use App\Modules\Users\Controllers\UserController;


Route::get('/users', [UserController::class,'index'])->name('users.index');
