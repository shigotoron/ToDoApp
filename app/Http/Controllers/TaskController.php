<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all(); // フォームで送信されたデータをすべてとってきます

        Task::insertGetId([
            'user_id' => \Auth::id(), // ログイン中のユーザーの ID を格納します
            'title' => $data['title'], // 入力された文字列を格納します
        ]);

        return redirect()->route('dashboard'); // 処理が終わったらダッシュボードにリダイレクトします
    }

    public function show()
    {
        $tasks = Task::where('user_id', \Auth::id())->get(); // ログイン中のユーザーが作成したタスクをすべてとってきます
        return view('dashboard', compact('tasks')); // ここではビューに変数を渡しています
    }

    public function delete($id)
    {
        /** この if 文がないと、他のユーザーのタスクを削除できてしまう可能性があります */
        if (Task::where('id', $id)->where('user_id', \Auth::id())->exists()) {
            Task::destroy($id); // クリックされた削除ボタンに対応するタスクを削除します
            return redirect()->route('dashboard'); // ダッシュボードにリダイレクトします
        } else {
            abort(500); // サーバーエラー
        }
    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->where('user_id', \Auth::id())->first(); // ID が $id の値と同じであるタスクをとってきます
        return view('edit', compact('task')); // ビューに変数を渡しています
    }

    // 追記ここから
    public function update(Request $request, $id)
    {
        $query = Task::where('id', $id)->where('user_id', \Auth::id());

        /** この if 文がないと、他のユーザーのタスクを更新できてしまう可能性があります */
        if ($query->exists()) {
            $query->update(['title' => $request->title]); // タスクのタイトルを更新しています
            return redirect()->route('dashboard'); // ダッシュボードにリダイレクトします
        } else {
            abort(500); // サーバーエラー
        }
    } // 追記ここまで
}
