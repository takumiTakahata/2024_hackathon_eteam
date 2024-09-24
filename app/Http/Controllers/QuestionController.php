<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\QuestionTag;
use App\Models\Answer;

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
        // バリデーション
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

        return redirect()->route('question.index');
    }

    public function show($id)
    {
        $question = Question::with('tags', 'answer')->findOrFail($id);
        $questiontags = QuestionTag::where('question_id', $id)->get();

        return view('questiondetail', [
            'question' => $question,
            'question_tags' => $questiontags
        ]);
    }

    public function Answerstore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
        ]);

        $question = Question::findOrFail($id);

        $answer = new Answer();
        $answer->question_id = $question->id;
        $answer->text = $validatedData['text'];
        $answer->save();

        return redirect()->route('question.show', ['id' => $id]);
    }

    public function questionindex(Request $request)
    {
        $query = Question::with('tags');

        if ($request->has('tag_ids')) {
            $tagIds = $request->input('tag_ids');
            if (!empty($tagIds)) {
                $query->whereHas('tags', function ($q) use ($tagIds) {
                    $q->whereIn('tags.id', $tagIds);
                });
            }
        }

        // ページネーション
        $questions = $query->paginate(10)->appends($request->except('page'));

        // タグ一覧の取得
        $tags = Tag::all();

        return view('questionindex', ['questions' => $questions, 'tags' => $tags]);
    }

    public function deleteQuestion($id)
    {
        $question = Question::find($id);

        if ($question) {
            $question->update(['delete_flag' => true]);  // trueにしてフラグを立てる
            echo ('成功');
            return redirect()->back()->with('success', '知恵袋が削除されました。');
        } else {
            echo ('失敗');
            return redirect()->back()->with('error', '知恵袋が見つかりませんでした。');
        }
    }
        public function adminquestion(Request $request)
    {
        $query = Question::with('tags');

        if ($request->has('tag_ids')) {
            $tagIds = $request->input('tag_ids');
            if (!empty($tagIds)) {
                $query->whereHas('tags', function ($q) use ($tagIds) {
                    $q->whereIn('tags.id', $tagIds);
                });
            }
        }

        // ページネーション
        $questions = $query->paginate(10)->appends($request->except('page'));

        // タグ一覧の取得
        $tags = Tag::all();

        return view('adminquestion', ['questions' => $questions, 'tags' => $tags]);
    }
}
