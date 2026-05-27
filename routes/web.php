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
    Route::post('/question', [PractiseController::class,'index'])
        ->middleware('throttle:30,1');
    Route::post('/startclass', [PractiseController::class,'startClass'])->name('startclass');
    Route::get('/viewmaterial/{id}', [PractiseController::class,'viewMaterialById'])->name('viewmaterial');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


    ///////demos controller
    Route::get('/demo/{lesson}', [DemoController::class, 'index'])
    ->name('demo');


    //private image retriever 
       Route::get('/lesson-images/{filename}', function ($filename) {

    abort_unless(auth()->check(), 403, 'Restricted page');

    $path = storage_path('app/private/lesson-images/' . basename($filename));

    abort_unless(file_exists($path), 404);

    return response()->file($path);

})->name('lesson.image');


});



    Route::get('/company/{slug}', function ($slug) {  return view('company', ['slug' => $slug]); })->name('company');

    Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');

    Route::post('/joinwaitlist', [PractiseController::class,'waitlist'])
        ->middleware('throttle:3,1')
        ->name('joinwaitlist');



        // routes/web.php - remove after debugging
Route::get('/debug-image', function () {
    $path = storage_path('app/private/lesson-images/image.jpeg');
    return response()->json([
        'cwd' => getcwd(),
        'storage_path' => $path,
        'exists' => file_exists($path),
        'files' => scandir(storage_path('app/private/lesson-images/')),
    ]);
});

require __DIR__.'/auth.php';
