<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class PractiseController extends Controller
{

    public function index(Request $request)
    {
                $user =Auth::user();
                $lesson_progress = $user->lesson_progress;
                $ads_to_play = $user->ads_to_play;

        $questions = DB::table('questions_and_answers')->select('id','answer')->where('learning_cycle',$lesson_progress)->get();
        // retrieving answers of the lesson level

        //retrieving the details of the submitted work.
        $formdata = $request->all();
        // foreach ($variable as $key => $value) {
            
        // }

        static $correct_answer_scores = 0; // Define the score for each correct answer
        static $incorrect_answer_scores = 0; // Define the score for each incorrect answer
       
        // Process the form data as needed fo database.
           foreach  ($questions as $question)
            {
                $question_id = $question->id;
                $answer = $question->answer;

                //form fields was named in relation to question id from the database
                $formfield = 'question_' . $question_id;

                // Check if the answer matches the submitted answer
                if (isset($formdata[$formfield]) && $formdata[$formfield] == $answer) 
                {    
                    $correct_answer_scores += 1; // Increment the score for correct answers
                }

                
                else {
                    // Incorrect answer logic
                    $incorrect_answer_scores += 1; // Increment the score for incorrect answers
                }
            }
              
            if ($ads_to_play == 0)  
            {
                    if ($incorrect_answer_scores > 0) {
        
                        // Auth::user()->update(['ads_to_playn' => 'new_value']);
                        Auth::user()->increment('ads_to_play', $incorrect_answer_scores);
                    }
                    else {
                        // Correct answer logic
                        Auth::user()->increment('lesson_progress', 1);
                    }

                }



            // Retrieve the rows from the database
            $assocArray = $questions->pluck('answer')->toArray();



            return response()->json([
            'message' => 'success',
            'score' => $correct_answer_scores,
            'id_and_answers' => $assocArray,
            'ads_to_play' => $ads_to_play
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function startclass()
    {
        //
                $user =Auth::user();
                $lesson_progress = $user->lesson_progress;
                $ads_to_play = $user->ads_to_play;

                  if ($ads_to_play == 0 && $lesson_progress == 0)
                {
                    // If the user has no ads to play and is at the beginning of the lesson
                     Auth::user()->increment('lesson_progress', 1);
                }

                return redirect()->route('dashboard');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function viewMaterialById(string $id)
    {
        //
        $material = DB::table('questions_and_answers')->where('learning_cycle', $id)->whereNotNull('material')->select('material', 'material_title')->first();
        if (!$material) {
            return response()->json(['message' => 'Material not found'], 404);
        }
        return view('viewmaterial', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
