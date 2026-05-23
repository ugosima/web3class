<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PractiseController;
use App\Http\Controllers\Auth\SocialAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Storage;



Route::get('/', [WelcomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/question', [PractiseController::class,'index']);
    Route::get('/startclass', [PractiseController::class,'startClass'])->name('startclass');
    Route::get('/viewmaterial/{id}', [PractiseController::class,'viewMaterialById'])->name('viewmaterial');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


    ///////demos controller
    Route::get('/demo/{lesson}', [DemoController::class, 'index'])
    ->name('demo');


    //private image retriever 
       Route::get('/lesson-images/{filename}', function ($filename) {
    abort_unless(auth()->check(), 403, 'Restricted page');

    $path = 'lesson-images/' . basename($filename);

    abort_unless(Storage::disk('local')->exists($path), 404);

    return response()->file(Storage::disk('local')->path($path));
    })->name('lesson.image');


});



    Route::get('/company/{slug}', function ($slug) {  return view('company', ['slug' => $slug]); })->name('company');

    Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');

    Route::post('/joinwaitlist', [PractiseController::class,'waitlist'])->name('joinwaitlist');




    // google login routes

    Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('google.callback');






require __DIR__.'/auth.php';
