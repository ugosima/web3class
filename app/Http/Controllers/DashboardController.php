<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\Lessonmap;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lessonMap = new Lessonmap();
        $lessondir = $lessonMap->lessondir($user->lesson_progress);


        
        $current_quest = $user->lesson_progress;
        $prev_quest = $current_quest - 1;
        if ($prev_quest < 1) {
            $prev_quest = 1; // Ensure it doesn't go below 1
        }
        $next_quest = $current_quest + 1;
        // Fetching the questions and answers based on the user's learning progress
        $highest_cycle = DB::table('questions_and_answers')->max('learning_cycle');
        $questions = DB::table('questions_and_answers')->where('learning_cycle',$current_quest)->inRandomOrder()->get();
        $material = DB::table('questions_and_answers')->where('learning_cycle',$current_quest)->select('material_title','lesson_video')->first();
        $material_titles = DB::table('questions_and_answers')
                            ->whereNotNull('material_title')
                            ->whereRaw("TRIM(material_title) != ''")
                            ->orderBy('learning_cycle', 'asc')
                            ->pluck('material_title', 'learning_cycle');

        $prev_material = DB::table('questions_and_answers')->where('learning_cycle', $prev_quest)->select( 'material_title','learning_cycle')->first();
        if (!$prev_material) {
            $prev_material = (object) ['material_title' => 'No previous material available', 'learning_cycle' => null];
        }
        $next_material = DB::table('questions_and_answers')->where('learning_cycle', $next_quest)->select('material_title')->first();
        if (!$next_material) {
            $next_material = (object) ['material_title' => 'No next material available'];
        }
        return view('dashboard', compact('user','questions','highest_cycle','prev_material','material','next_material', 'material_titles', 'lessondir'));
    }
}
