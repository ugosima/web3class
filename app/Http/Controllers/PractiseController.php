<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Services\Lessonmap;



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
         // build validation rules
       $question_ids = $questions->pluck('id');


        $rules = [];
        foreach ($question_ids as $id) {
            $rules['question_' . $id] = 'required|string';
        }

        // validate input
         $request->validate($rules);
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
                                Auth::user()->increment('ads_to_play', $incorrect_answer_scores);
                                Auth::user()->decrement('points', 100); // Deduct points for incorrect answers
                    }
                    else {
                        // All correct answer logic
                        Auth::user()->increment('lesson_progress', 1);
                    }

                }



            // Retrieve the rows from the database
            $assocArray = $questions->pluck('answer','id')->toArray();
        

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
        $lessonMap = new Lessonmap();
        $lessondir = $lessonMap->lessondir($id);

        $user =Auth::user();
        $view_id = (abs((int)$id) + (int)$id) / 2; // Convert to integer and take absolute value
        if ( $view_id <= $user->lesson_progress)
        { 
            $material = DB::table('questions_and_answers')->where('learning_cycle', $id)->select( 'material_title')->first();
            $material_titles = DB::table('questions_and_answers') ->whereNotNull('material_title')->pluck('material_title', 'learning_cycle'); // Retrieve material titles with learning_cycle as key, this is used to render dynamic content from another component , and so must not be retrieved together with material.

            if (!$material) {
                return response()->json(['message' => 'Material not found'], 404);
            }
            return view('viewmaterial', compact( 'material', 'view_id', 'user', 'material_titles', 'lessondir'));
         }
        
         else
         { 
            //  return view('viewmaterial', compact('material', 'view_id', 'user', 'material_titles'));
             return back()->with('error', 'Not yet available!');


         }
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

    public function waitlist(Request $request)
    {
        // Validate the email
        $validated = $request->validate([
            'waitlist_email' => 'required|email'
        ]);

        try {
            // Insert the email into the waitlist_emails table
            $exists = DB::table('waitlist_emails')->where('emails', $validated['waitlist_email'])->exists();

            if (!$exists) {
                DB::table('waitlist_emails')->insert([
                    'emails' => $validated['waitlist_email'],
                    'created_at' => now() ]);

                    return response()->json([
                'success' => true,
                'message' => 'You have been added to the waitlist!'
            ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'This email is already on the waitlist.'
                ], 400);
            }

            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again.'
            ], 500);
        }
    }
}
