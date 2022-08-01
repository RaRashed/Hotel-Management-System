<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
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
//Home page

Route::get('/',[HomeController::class, 'home']);
Route::get('about_us',[PageController::class, 'about_us']);
Route::get('contact_us',[PageController::class, 'contact_us']);
Route::post('save-contact',[PageController::class, 'save_contact']);
//Admin Login
Route::get('admin/login',[AdminController::class, 'login']);
Route::post('admin/login_check',[AdminController::class, 'check_login']);
Route::get('admin/logout',[AdminController::class, 'logout']);


//Admin Dashboard
Route::get('admin',[AdminController::class, 'dashboard']);
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

//Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class, 'destroy_image']);
Route::delete('deleteimage/{img_id}', 'Cat@destroy_image')->name('delete.image');

//Department Routes

Route::get('admin/department/{id}/delete',[StaffDepartmentController::class, 'destroy']);
Route::resource('admin/department', StaffDepartmentController::class);

//Staff Routes

Route::get('admin/staff/{id}/delete',[StaffController::class, 'destroy']);
Route::resource('admin/staff', StaffController::class);

//Staff Payment
Route::get('admin/staff/payments/{id}',[StaffController::class, 'all_payment']);
Route::get('admin/staff/payment/{id}/add_payment',[StaffController::class, 'add_payment']);
Route::post('admin/staff/payment/{id}',[StaffController::class, 'save_payment']);
Route::get('admin/staff/payment/{id}/{$staff_id}/delete',[StaffController::class, 'delete_payment']);

//Booking Routes
Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class, 'available_rooms']);
Route::get('admin/booking/{id}/delete',[StaffController::class, 'destroy']);
Route::resource('admin/booking', BookingController::class);
Route::get('admin/booking/{id}/delete',[BookingController::class, 'destroy']);

//Frontend Customer Routes
Route::get('register',[CustomerController::class, 'register']);
Route::post('register_check',[CustomerController::class, 'register_check']);
Route::get('login',[CustomerController::class, 'login']);
Route::post('login_check',[CustomerController::class, 'login_check']);
Route::get('logout',[CustomerController::class, 'logout']);

//Frontend Booking
Route::get('booking',[BookingController::class, 'front_booking']);

//Payments Route
Route::get('booking/success',[BookingController::class, 'booking_payment_success']);
Route::get('booking/fail',[BookingController::class, 'booking_payment_fail']);

//Service CRUD

Route::get('admin/service/{id}/delete',[ServiceController::class, 'destroy']);
Route::resource('admin/service', ServiceController::class);

Route::get('service/detail/{id}',[HomeController::class, 'detail']);

//Testimonial
Route::get('customer/add-testimonial',[HomeController::class, 'add_testimonial']);

Route::post('customer/save-testimonial',[HomeController::class, 'save_testimonial']);
Route::get('testimonial/show',[AdminController::class, 'testimonial']);
Route::get('admin/testimonials/{id}/delete',[AdminController::class, 'destroy_testimonial']);

//About
//Contact

//frontend image
Route::get('admin/frontendimage/{id}/delete',[FrontendImageController::class, 'destroy']);
Route::resource('admin/frontendimage', FrontendImageController::class);
