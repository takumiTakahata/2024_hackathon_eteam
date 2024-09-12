<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\QuestionTag;

class QuestionController extends Controller
{
    public function questionCreate(Request $request)
    {
        $tags = Tag::all();
        return view('question', ['tags' => $tags]);
    }

    public function questionConfirm(Request $request)
    {
        //  バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required',
            'tags' => 'required|array',
        ]);

        // タグ情報
        $tags = Tag::whereIn('id', $validatedData['tags'])->get();

        // 確認画面
        return view('questionConfirm', [
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'tags' => $tags,
            'tag_ids' => $validatedData['tags'],
        ]);
    }

    public function questionAdd(Request $request)
    {
        //  バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required',
            'tags' => 'required|array',
        ]);

        // 知恵袋保存
        $question = new Question();
        $question->title = $validatedData['title'];
        $question->text = $validatedData['text'];
        $question->save();

        // 中間テーブルに保存
        foreach ($validatedData['tags'] as $tagId) {
            QuestionTag::create([
                'question_id' => $question->id,
                'tags_id' => $tagId,
            ]);
        }

        return redirect()->route('question_list');
    }
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('questiondetail', ['question' => $question]);
    }
}