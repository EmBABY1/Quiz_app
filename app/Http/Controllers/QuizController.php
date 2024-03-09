<?php

namespace App\Http\Controllers;

use App\Models\exam;
use App\Models\Quiz;
use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            // Add more validation rules as needed
        ]);

        // Create a new quiz
        $quiz = Quiz::create([
            'title' => $request->input('title'),
            'question'=>$request->input('question'),
            'answer'=>$request->input('answer'),
            // Add more fields as needed
        ]);
        $answer = Answers::create([
            'a1' => $request->input('option_a'),
            'a2' => $request->input('option_b'),
            'a3' => $request->input('option_c'),
            'a4' => $request->input('option_d'),
            'qid' => $quiz->id,
            // Add more fields as needed
        ]);
        return redirect()->back();
       
    }

    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        compact('quiz');
       
    }

    public function checkanswer(request $request)
    {

        $correctAnswers = $request->input('correctanswer', []);
        $selectedAnswers = $request->input('answer',[]);
        $questionId = $request->input('questionId', []);
        foreach ($questionId as $key => $qid) {
            $exam = exam::create([
                'qid' => $qid,
                'correct_answer' => $correctAnswers[$key] ?? null,
                'select_answer' => $selectedAnswers[$key+1] ?? null,
            ]);
        }
        $results = []; 
        if(!($selectedAnswers))
        $results[]=" No correct answers found";
        else
        for ($i = 0; $i < count($correctAnswers); $i++) {
            if( $selectedAnswers[$i+1]== $correctAnswers[$i])
            {
                  $results[]=$selectedAnswers[$i+1]. " correct";
            }
            else
                  $results[]=$selectedAnswers[$i+1]. " in correct";
        }
        $result1= DB::select('select answer ,a1,a2,a3,a4,a.id,question,a.qid from answers a,quizzes q WHERE q.id=qid');
        return view('user',['quizzes'=>$result1])->with('results', $results);  
    }

}