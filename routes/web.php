<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, "index"]);
Route::get('/about', [PageController::class, "about"]);
Route::get('/blog-inner/{id}', [PageController::class, "blog_inner"]);
Route::get('/blog', [PageController::class, "blog"]);
Route::get('/contacts', [PageController::class, "contacts"]);
Route::get('/direction/{id}', [PageController::class, "directions_inner"]);
Route::get('/directions', [PageController::class, "directions"]);
Route::get('/prices', [PageController::class, "prices"]);
Route::get('/service/{id}', [PageController::class, "services_inner"]);
Route::get('/specialist/{id}', [PageController::class, "specialists_inner"]);
Route::get('/specialists', [PageController::class, "specialists"]);

Route::post('/post-application', [ApplicationController::class, "post_application"]);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
