<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffDepartmentController;
use App\Models\RoomType;

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
    return view('home');
});
//Admin Login
Route::get('admin/login',[AdminController::class, 'login']);
Route::post('admin/login_check',[AdminController::class, 'check_login']);
Route::get('admin/logout',[AdminController::class, 'logout']);


//Admin Dashboard
Route::get('admin', function () {

    return view('dashboard');
});
//RoomType Routes
Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class, 'destroy']);
Route::resource('admin/roomtype', RoomtypeController::class);

//Room Routes

Route::get('admin/rooms/{id}/delete',[RoomController::class, 'destroy']);
Route::resource('admin/rooms', RoomController::class);

//Admin routes
//Route::get('admin',[AdminController::class, 'admin']);

Route::get('admin/customer/{id}/delete',[CustomerController::class, 'destroy']);
Route::resource('admin/customer', CustomerController::class);

//image delete

Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class, 'destroy_image']);

//Department Routes

Route::get('admin/department/{id}/delete',[StaffDepartmentController::class, 'destroy']);
Route::resource('admin/department', StaffDepartmentController::class);

//Staff Routes

Route::get('admin/staff/{id}/delete',[StaffController::class, 'destroy']);
Route::resource('admin/staff', StaffController::class);

//Staff Payment
Route::get('admin/staff/payment/{id}/add_payment',[StaffController::class, 'add_payment']);
Route::post('admin/staff/payment/{id}',[StaffController::class, 'save_payment']);
