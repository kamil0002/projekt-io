<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\CarReturnController;
use App\Http\Controllers\ContactController;
use App\Models\CarReturn;

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

Route::get('/', function () {})->middleware('redirectToHome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [\App\Http\Controllers\AdminPanelController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.panel');

Route::get('/admin/users/list', [UserController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.users');
Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->middleware('redirectIfNoAccess')->name('admin.users.edit');
Route::get('/admin/users/list/{search}', [UserController::class, 'indexSearch'])->middleware('redirectIfNoAccess')->name('admin.users.search');
Route::get('/admin/cars/list', [CarController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.cars');
Route::get('/admin/cars/list/{search}', [CarController::class, 'indexSearch'])->middleware('redirectIfNoAccess')->name('admin.cars.search');
Route::get('/admin/cars/car-edit/{id}', [CarController::class, 'edit'])->middleware('redirectIfNoAccess')->name('admin.cars.edit');
Route::put('/admin/car/update/{id}', [CarController::class,'update'])->middleware('redirectIfNoAccess')->name('admin.cars.update');
Route::put('/admin/user/update/{id}', [UserController::class,'update'])->middleware('redirectIfNoAccess')->name('admin.users.update');
Route::delete('/admin/user/delete/{id}', [UserController::class,'destroy'])->middleware('redirectIfNoAccess')->name('admin.users.delete');
Route::delete('/admin/car/delete/{id}', [CarController::class,'destroy'])->middleware('redirectIfNoAccess')->name('admin.cars.delete');
Route::get('/admin/car/car-create', [CarController::class,'add'])->middleware('redirectIfNoAccess')->name('admin.cars.add');
Route::post('/admin/car/car-create', [CarController::class,'create'])->middleware('redirectIfNoAccess')->name('admin.cars.create');
Route::get('/admin/insurances/list', [\App\Http\Controllers\InsuranceController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.insurances');
Route::get('/admin/opinions/list', [OpinionController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.opinions');
Route::get('/admin/rents/list', [RentController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.rents');
Route::get('/carfleet/fleet', [FleetController::class, 'index'])->name('carfleet.fleet');
Route::get('/carfleet/cardetails/{id}', [FleetController::class, 'show_details'])->name('carfleet.cardetails');
Route::get('/rent/{id}', [RentController::class, 'rental_form'])->middleware('redirectIfUserNotLogin')->name('rent');
Route::post('/carfleet/fleet', [RentController::class, 'rental'])->middleware('redirectIfUserNotLogin')->name('cost');
Route::get('/admin/returns/list', [CarReturnController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.returns');
Route::put('/admin/returns/list', [CarReturnController::class, 'create'])->middleware('redirectIfNoAccess')->name('admin.returns.create');
Route::get('/admin/rents/list', [RentController::class, 'index'])->middleware('redirectIfNoAccess')->name('admin.rents');
Route::get('/contact', [ContactController::class, 'show_contact'])->name('contact');
Route::get('/opinions', [OpinionController::class, 'opinion_form'])->name('opinion_form');
Route::post('/opinions', [OpinionController::class, 'opinion_create'])->name('opinion_create');

Route::get('/user/user/edit/{id}', [UserController::class, 'userEdit'])->middleware('userPanelAccess')->name('user.edit');
Route::get('/user/rents/{id}', [UserController::class, 'userRents'])->middleware('userPanelAccess')->name('user.rents.show');
Route::post('/user/rents/cancel', [RentController::class, 'deleteReservation'])->middleware('userPanelAccess')->name('user.rent.cancel');
Route::put('/user/user/update/{id}', [UserController::class,'update'])->middleware('userPanelAccess')->name('user.update');

// Route::post('/admin/returns/list', [CarReturnController::class, 'filter'])->middleware('redirectIfNoAccess')->name('admin.returns.filter');

Route::get('/admin/returns/list/{search}', [CarReturnController::class, 'indexSearch'])->middleware('redirectIfNoAccess')->name('admin.returns.search');
