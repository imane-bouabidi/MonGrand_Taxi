<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PassengerController;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/adminDashboard', [homeController::class, 'adminDashboard'])
    ->name('adminDashboard')
    ->middleware('can:adminPermission');

Route::get('/chauffeurDashboard', [homeController::class, 'chauffeurDashboard'])
    ->name('chauffeurDashboard')
    ->middleware('can:chauffeurPermission');

Route::get('/passengerDashboard', [PassengerController::class, 'passengerDashboard'])
    ->name('passengerDashboard')
    ->middleware('can:userPermission');

Route::get('/home', 'App\Http\Controllers\homeController@index')->name('home');
Route::get('/add_horaire/{horaire}', 'App\Http\Controllers\homeController@add_horaire')->name('add_horaire');
Route::get('/book_taxi/{id}', 'App\Http\Controllers\PassengerController@book_taxi')->name('book_taxi');
Route::get('/annuler_reser/{id}', 'App\Http\Controllers\PassengerController@annuler_reser')->name('annuler_reser');
Route::get('/change_statut_driver', 'App\Http\Controllers\homeController@change_statut_driver')->name('change_statut_driver');
Route::get('/afficher_reservations', 'App\Http\Controllers\homeController@afficher_reservations')->name('afficher_reservations');
Route::get('/search',[homeController::class, 'search']);

