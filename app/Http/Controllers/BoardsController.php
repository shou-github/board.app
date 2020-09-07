<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Board;


class BoardsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            // ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
            $boards = $user->feed_boards()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'boards' => $boards,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            
        ]);
        
       
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->boards()->create([
            'content' => $request->content,
        ]);
        
         
        
        return redirect('/');
    }
    
    public function edit($id)
    {
        // idの値でメモを検索して取得
        $board = Board::findOrFail($id);
        
            // メモ編集をviewで表示させる
        if (\Auth::id() === $board->user_id) {
            return view('boards.edit', [
            'board' => $board,
        ]);
            }
        // ページをリダイレクトする
        return redirect('/');
        
    }
    
    
    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate($request, [
            'content' => 'required|max:255'

        ]);
        
        
       
        // idの値でユーザーを検索して取得
        $board = Board::findOrFail($id);

         // ログイン中に画像を表示し保存する
        if (\Auth::id() === $board->user_id) {

            $board->content = $request->content;
            $board->save();
        }
        return redirect('/');
    }
    
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $board = \App\Board::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $board->user_id) {
            $board->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    
}
