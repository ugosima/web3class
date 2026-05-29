<?php

namespace App\Http\Controllers;

class LessonImageController extends Controller
{
    /**
     * @var array<string, int>
     */
    private array $requiredLessonByFilename = [
        'lesson-2-blockchain-image.jpeg' => 2,
        'liquiditypool.jpeg' => 8,
        'tokenomics_infographics.jpeg' => 10,
        'safety_infographics.jpeg' => 12,
        'candlestick.png' => 23,
        'candlegroups.jpg' => 23,
    ];

    public function show($filename)
    {
        $user = auth()->user();
        abort_unless($user, 403);

        $filename = basename($filename);
        $requiredLesson = $this->requiredLessonByFilename[$filename] ?? null;

        abort_unless($requiredLesson, 404);
        abort_unless($user->lesson_progress >= $requiredLesson, 403);

        $path = storage_path('app/private/lesson-images/' . $filename);
        abort_unless(file_exists($path), 404);

        return response()->file($path);
    }
}
