<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; // 修正
use App\Models\Tag;
use ValidatesRequests;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $Tags = Tag::all();
        return view('question', ['Tags' => $Tags]);
    }

    public function store(Request $request)
    {
        $this->validate($request, Question::$rules);

        $question = new Question;
        
        $form = $request->all();
        unset($form['_token']);
        
        $question->fill($form)->save();

        return redirect()->route('question.show');
    }

    public function show()
    {
        return view('show'); 
    }
}