<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomStatusController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UtilityController;
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('login', [AuthController::class, 'index'])->name('login');

    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('rooms/{room}/add-service', [HomeController::class, 'addService'])->name('rooms.add_service');
        Route::get('rooms/{room}/detail', [HomeController::class, 'detail'])->name('detail');
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::post('orders/checkout/{order}', [OrderController::class, 'checkout'])->name('orders.checkout');
        Route::post('orders/service/{order}', [OrderController::class, 'service'])->name('orders.service');
        Route::post('bookings/{booking}/room', [BookingController::class, 'selectRoom']);
        Route::post('rooms/{room}/confirm-checkout', [HomeController::class, 'confirmCheckout'])->name('rooms.confirm_checkout');
        Route::get('rooms/{room}/checkout', [HomeController::class, 'checkout'])->name('rooms.checkout');
        Route::post('rooms/{room}/checkin', [HomeController::class, 'checkin'])->name('rooms.checkin');
        Route::post('rooms/{room}/confirm-booking', [HomeController::class, 'roomConfirmBooking'])->name('rooms.confirm_booking');
        Route::get('rooms/{room}/booking', [HomeController::class, 'roomBooking'])->name('rooms.booking');
        Route::post('rooms/{room}/update-status', [HomeController::class, 'updateRoomStatus'])->name('rooms.update_status');
        Route::post('bookings/{booking}/cancel', [HomeController::class, 'cancelBooking'])->name('bookings.cancel');
        Route::get('bookings/{booking}/room', [BookingController::class, 'room'])->name('bookings.room');
        Route::resource('bookings', BookingController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('room_types', RoomTypeController::class);
        Route::resource('room_statuses', RoomStatusController::class);
        Route::resource('utilities', UtilityController::class);
        Route::resource('services', ServiceController::class);
    });
});

Route::middleware('auth:user')->group(function () {
    Route::post('booking', [ClientController::class, 'storeBooking']);
    Route::post('change-info', [ClientController::class, 'changeInfo']);
    Route::get('change-info', [ClientController::class, 'changeInfoView'])->name('change_info');
    Route::post('change-password', [ClientController::class, 'changePassword']);
    Route::get('change-password', [ClientController::class, 'changePasswordView'])->name('change_password');
    Route::post('logout', [ClientController::class, 'logout'])->name('logout');
    Route::post('booking/{booking}/cancel', [ClientController::class, 'cancelBooking'])->name('cancel_booking');
    Route::get('booking-list', [ClientController::class, 'bookingList'])->name('booking_list');
    Route::get('booking', [ClientController::class, 'booking'])->name('booking');
});

Route::post('signup', [ClientController::class, 'register']);
Route::post('login', [ClientController::class, 'authenticate']);
Route::get('service', [ClientController::class, 'service'])->name('service');
Route::get('contact', [ClientController::class, 'contact'])->name('contact');
Route::get('about', [ClientController::class, 'about'])->name('about');
Route::get('signup', [ClientController::class, 'signup'])->name('signup');
Route::get('login', [ClientController::class, 'login'])->name('login');
Route::get('room', [ClientController::class, 'room'])->name('room');
Route::get('room/{roomType}', [ClientController::class, 'detail'])->name('detail');
Route::get('/', [ClientController::class, 'index'])->name('index');
