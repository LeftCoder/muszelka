<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardPagesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// Pages
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/domki', [PagesController::class, 'apartments'])->name('apartments');
Route::get('/rezerwacje', [PagesController::class, 'reservations'])->name('reservation');
Route::get('/rezerwacje/checkout', [PagesController::class, 'checkout'])->name('reservation.checkout');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('/polityka-prywatnosci', [PagesController::class, 'policy'])->name('policy');
Route::get('/regulamin', [PagesController::class, 'terms'])->name('terms');
Route::get('/kontakt', [PagesController::class, 'contact'])->name('contact');

//Reservation form
Route::post('/reservation', [ReservationController::class, 'store']);
Route::get('/success/{token}', [ReservationController::class, 'confirmed']);

// Contact form
Route::post('/contact', [ContactController::class, 'send']);

// Dashboard
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardPagesController::class, 'dashboard']);
    Route::get('/rezerwacje', [DashboardPagesController::class, 'reservations']);
    Route::get('/domki', [DashboardPagesController::class, 'apartments']);
    Route::patch('/domki/{apartment}', [ApartmentController::class, 'update']);
    Route::get('/domki/{apartment}/edit', [ApartmentController::class, 'edit']);
    Route::get('/domki/create', [ApartmentController::class, 'create']);
    Route::post('/domki', [ApartmentController::class, 'store']);

    Route::patch('/api/occupied/{apartment}', [ApartmentController::class, 'occupied']);
    Route::get('/api/booked', [ReservationController::class, 'booked']);
    Route::post('/api/upload', [ImageController::class, 'upload']);
    Route::delete('/api/delete', [ImageController::class, 'destroy']);
});

require __DIR__.'/auth.php';
