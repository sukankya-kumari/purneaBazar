<?php

use App\Http\Controllers\BusinessController;
use App\Models\Business;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[BusinessController::class,'home'])->name('home');
Route::get('/filter/{urls}',[BusinessController::class,'filter'])->name('user.filter');
Route::delete('detail/delete/{id}',[BusinessController::class,"deletedetail"])->name("admin.detail.delete");
Route::get('edit/{id}',[BusinessController::class,"edit"])->name("admin.edit");

Route::post("/edit",[BusinessController::class,"update"])->name('update');

Route::get('/details',[BusinessController::class,'details'])->name('admin.details');

Route::get('/single/{slugs}',[BusinessController::class,'single'])->name('user.single');
Route::match(['post','get'],'/businessInsert',[BusinessController::class,'businessInsert'])->name('businessInsert');
Route::match(['post','get'],'insert',[BusinessController::class,'insert'])->name('insert');
Route::get("/vote/{id}",[BusinessController::class,"vote"])->name('vote');
Route::get("/unlike/{id}",[BusinessController::class,"unlike"]);
Route::match(['post','get'],'review',[BusinessController::class,'review'])->name('review');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
