<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\Question_Tag;

class QuestionController extends Controller
{
    public function questionCreate(Request $request)
    {
        $tags = Tag::all();
        return view('question', ['tags' => $tags]);
    }

    public function questionConfirm(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'tags' => 'required|array',
        ]);

        // タグ情報を取得
        $tags = Tag::whereIn('id', $validatedData['tags'])->get();

        // 確認画面にデータを渡す
        return view('questionConfirm', [
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'tags' => $tags,
            'tag_ids' => $validatedData['tags'],
        ]);
    }

    public function questionAdd(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'tags' => 'required|array',
        ]);

        // 記事を保存
        $question = new Question();
        $question->title = $validatedData['title'];
        $question->text = $validatedData['content'];
        $question->save();

        // 記事とタグの中間テーブルに保存
        foreach ($validatedData['tags'] as $tagId) {
            Question_Tag::create([
                'Question_id' => $question->id,
                'tags_id' => $tagId,
            ]);
        }

        return redirect()->route('question_list');
    }
}