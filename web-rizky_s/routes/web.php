<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class, 'index']);



Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest');


Route::middleware('auth')->group( function(){

    Route::get('/admin', function(){
        return View('admin.dashboard.index', [
            'title' =>'Dashboard'
        ]);
            
    });
    
    Route::get('/users', [UserController::class, 'index']);
    
    Route::get('/users/create', [UserController::class, 'create']);
    
    Route::post('/users/store', [UserController::class, 'store']);
    
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    
    Route::put('/users/{id}/update', [UserController::class, 'update']);
    
    Route::get('/users/{id}/destroy', [UserController::class, 'destroy']);

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::resource('categories', CategoryController::class);

    Route::resource('posts', PostController::class);

    Route::resource('galleries', GalleryController::class);

    Route::post('/images/store/{id}', [ImageController::class, 'store']);
    
    Route::delete('/images/{id}', [ImageController::class, 'destroy']);

    


});

