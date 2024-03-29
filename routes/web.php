<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardPagesController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Pages
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/domki', [PagesController::class, 'apartments'])->name('apartments');
Route::get('/rezerwacja', [PagesController::class, 'reservation'])->name('reservation');
Route::get('/rezerwacja/podsumowanie', [PagesController::class, 'checkout'])->name('reservation.checkout');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('/polityka-prywatnosci', [PagesController::class, 'policy'])->name('policy');
Route::get('/regulamin', [PagesController::class, 'terms'])->name('terms');
Route::get('/kontakt', [PagesController::class, 'contact'])->name('contact');
Route::post('/opinie', [ReviewController::class, 'send']);

//Reservation form
Route::post('/reservation', [ReservationController::class, 'store']);
Route::get('/success/{token}', [ReservationController::class, 'confirmed']);

// Contact form
Route::post('/contact', [ContactController::class, 'send']);

// Dashboard
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardPagesController::class, 'dashboard']);

    //Rezerwacje
    Route::get('/rezerwacje', [DashboardPagesController::class, 'reservations']);

    //Domki
    Route::get('/domki', [DashboardPagesController::class, 'apartments']);
    Route::get('/domki/create', [ApartmentController::class, 'create']);
    Route::post('/domki', [ApartmentController::class, 'store']);
    Route::get('/domki/{apartment}/edit', [ApartmentController::class, 'edit']);
    Route::patch('/domki/{apartment}', [ApartmentController::class, 'update']);
    Route::delete('/domki/{apartment}', [ApartmentController::class, 'destroy']);

    //Cennik
    Route::get('/cennik', [DashboardPagesController::class, 'pricelist']);
    Route::get('/cennik/create', [PeriodController::class, 'create']);
    Route::post('/cennik', [PeriodController::class, 'store']);
    Route::get('/cennik/{period}/edit', [PeriodController::class, 'edit']);
    Route::patch('/cennik/{period}', [PeriodController::class, 'update']);
    Route::delete('/cennik/{period}', [PeriodController::class, 'destroy']);

    //Udogodnienia
    Route::get('/udogodnienia', [DashboardPagesController::class, 'features']);
    Route::get('/udogodnienia/create', [FeatureController::class, 'create']);
    Route::post('/udogodnienia', [FeatureController::class, 'store']);
    Route::get('/udogodnienia/{feature}/edit', [FeatureController::class, 'edit']);
    Route::patch('/udogodnienia/{feature}', [FeatureController::class, 'update']);
    Route::delete('/udogodnienia/{feature}', [FeatureController::class, 'destroy']);

    //Opinie
    Route::get('/opinie', [DashboardPagesController::class, 'reviews']);
    Route::get('/opinie/create', [ReviewController::class, 'create']);
    Route::post('/opinie', [ReviewController::class, 'store']);
    Route::get('/opinie/{review}/edit', [ReviewController::class, 'edit']);
    Route::patch('/opinie/{review}', [ReviewController::class, 'update']);
    Route::delete('/opinie/{review}', [ReviewController::class, 'destroy']);

    //Faq
    Route::get('/faq', [DashboardPagesController::class, 'faqs']);
    Route::get('/faq/create', [FaqController::class, 'create']);
    Route::post('/faq', [FaqController::class, 'store']);
    Route::get('/faq/{faq}/edit', [FaqController::class, 'edit']);
    Route::patch('/faq/{faq}', [FaqController::class, 'update']);
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy']);

    //api
    Route::patch('/api/occupied/{apartment}', [ApartmentController::class, 'occupied']);
    Route::patch('/api/status/{reservation}', [ReservationController::class, 'status']);
    Route::get('/api/booked', [ReservationController::class, 'booked']);
    Route::get('/api/stats', [ReservationController::class, 'stats']);
    Route::patch('/api/published/{review}', [ReviewController::class, 'published']);
    Route::get('/api/features', [FeatureController::class, 'features']);
    Route::post('/api/upload', [ImageController::class, 'upload']);
    Route::delete('/api/delete', [ImageController::class, 'destroy']);
    Route::delete('/api/delete/{image}', [ImageController::class, 'delete']);
});

require __DIR__.'/auth.php';
