<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PractiseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/question', [PractiseController::class,'index']);
    Route::get('/startclass', [PractiseController::class,'startClass'])->name('startclass');
    Route::get('/viewmaterial/{id}', [PractiseController::class,'viewMaterialById'])->name('viewmaterial');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


});


Route::get('/company/{slug}', function ($slug) {  return view('company', ['slug' => $slug]); })->name('company');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');



// google login routes

Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('google.callback');





require __DIR__.'/auth.php';
