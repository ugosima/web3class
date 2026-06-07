<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PractiseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\LessonImageController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AdsWatchController;



Route::get('/', [WelcomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/question', [PractiseController::class,'index'])
        ->middleware('throttle:30,1');
    Route::post('/startclass', [PractiseController::class,'startClass'])->name('startclass');
    Route::get('/viewmaterial/{id}', [PractiseController::class,'viewMaterialById'])->name('viewmaterial');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


    ///////demos controller
    Route::get('/demo/{lesson}', [DemoController::class, 'index'])
    ->name('demo');


    //private image retriever 
     Route::get('/lesson-images/{filename}', [LessonImageController::class, 'show'])
    ->name('lesson.image');

    // Ads Watch Controller
    Route::post('/adswatch', AdsWatchController::class)
    ->name('adswatch');
});



    Route::get('/company/{slug}', function ($slug) {  return view('company', ['slug' => $slug]); })->name('company');

    Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');

    Route::post('/joinwaitlist', [PractiseController::class,'waitlist'])
        ->middleware('throttle:3,1')
        ->name('joinwaitlist');

    Route::post('/adsserver', AdsController::class)
    ->name('adsserver');

   



require __DIR__.'/auth.php';
