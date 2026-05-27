<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonImageController extends Controller
{
    public function show($filename)
    {
        abort_unless(auth()->check(), 403);
        $path = storage_path('app/private/lesson-images/' . basename($filename));
        abort_unless(file_exists($path), 404);
        return response()->file($path);
    }
}