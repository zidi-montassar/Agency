<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicPropertyController;
use App\Http\Requests\PropertyContactRequest;
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

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/properties', [PublicPropertyController::class, 'index'])->name('property.index');

Route::get('/properties/{slug}-{property}', [PublicPropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex
]);

Route::post('/properties/{property}/contact', [PublicPropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex
]);


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function (){
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::post('/login', 'dologin');
    Route::delete('/logout', 'logout')->middleware('auth')->name('logout');
});