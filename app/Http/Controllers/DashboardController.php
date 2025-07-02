<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recentActivities = [
            ['description' => 'Completed “Intro to HTML”', 'points' => 20],
            ['description' => 'Referred a friend', 'points' => 50],
        ];
        $availableCourses = [
            ['title' => 'CSS Basics', 'points' => 30],
            ['title' => 'JavaScript Challenge', 'points' => 40],
        ];

        $current_quest = $user->lesson_progress;
        $prev_quest = $current_quest - 1;
        $next_quest = $current_quest + 1;
        // Fetching the questions and answers based on the user's learning progress
        $questions = DB::table('questions_and_answers')->where('learning_cycle',$current_quest)->inRandomOrder()->get();
        $material = DB::table('questions_and_answers')->where('learning_cycle',$current_quest)->select('material','material_title','lesson_video')->first();
        $material_titles = DB::table('questions_and_answers') ->whereNotNull('material_title')->pluck('material_title', 'learning_cycle');
        $prev_material = DB::table('questions_and_answers')->where('learning_cycle', $prev_quest)->select( 'material_title','learning_cycle')->first();
        if (!$prev_material) {
            $prev_material = (object) ['material_title' => 'No previous material available', 'id' => null];
        }
        $next_material = DB::table('questions_and_answers')->where('learning_cycle', $next_quest)->select('material_title')->first();
        if (!$next_material) {
            $next_material = (object) ['material_title' => 'No next material available'];
        }
        return view('dashboard', compact('user', 'recentActivities', 'availableCourses', 'questions', 'material','prev_material', 'next_material', 'material_titles'));
    }
}
