<?php


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EditingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\listitemController;
use App\Http\Controllers\ListProduct;
use App\Http\Controllers\ProductController;
use App\Http\Middleware;
use App\Http\Middleware\Admin;
use App\Http\Middleware\EnsureTokenIsValid;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('user/{id}/{name}', function ($id, $name) {
    echo $id . "<br/>";
    echo $name;
    exit;
})->whereNumber('id')->whereAlpha('name');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return 'Hello World';
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('admin/login', function() {
    return view('admin.login');
});

Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
    Route::get('/admin/listing/{model}', [ListingController::class, 'index'])->name('listing.index');
    Route::post('/admin/listing/{model}', [ListingController::class, 'index'])->name('listing.index');
    Route::get('/admin/editing/{model}', [EditingController::class, 'create'])->name('editing.create');
    Route::post('/admin/editing/{model}', [EditingController::class, 'store'])->name('editing.store');
});
// Route::get('index',[
//     'as'=>'trang-chu',
//     'user'=>'PageController@getIndex'
// ]);
Route::get('/index', [PageController::class, 'getIndex'])->name('index')->middleware('auth');
Route::get('/loaisanpham/{type}',[PageController::class, 'getloaiSP'])->name('loai');
Route::get('/chitiet/{id}',[PageController::class, 'chitietSP'])->name('chitiet');
Route::get('/lienhe',[PageController::class, 'lienhe'])->name('lienhe');
Route::get('/gioithieu',[PageController::class, 'gioithieu'])->name('gioithieu');
Route::get('/add-cart/{id}',[PageController::class, 'getAddtoCart'])->name('addCart');
Route::get('/del-cart/{id}',[PageController::class, 'getDelItemCart'])->name('delCart');
Route::post('dat-hang',[PageController::class, 'postCheckout'])->name('datHang');
Route::get('dat-hang',[PageController::class, 'getCheckout'])->name('datHang');
Route::resource("order",OrderController::class);
Route::resource("user",UserController::class);
// Route::resource("user",UserController::class);