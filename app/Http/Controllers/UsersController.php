<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use Storage;

use App\User;


class UsersController extends Controller
{
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $boards = $user->boards()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
            'user' => $user,
            'boards' => $boards,
        ]);
    }
    
    public function edit($id)
    {
        // idの値でメモを検索して取得
        $user = User::findOrFail($id);
        
            // メモ編集をviewで表示させる
        if (\Auth::id() === $user->id) {
            return view('users.edit', [
            'user' => $user,
        ]);
    }
        // ページをリダイレクトする
        return redirect('/');
        
    }
    
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }

    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    public function show_favorite($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();



        // ユーザの投稿一覧を作成日時の降順で取得
        $boards = $user->boards()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれらを表示
        return view('users.show_favorite', [
            'user' => $user,
            'boards' => $boards,
        ]);
    }
    
    public function favorites($id)
    {
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();

        $favorites = $user->favorites()->paginate(10);

        return view('users.favorites', [
            'user' => $user,
            'boards' => $favorites,
        ]);
    }
    
    //   画像を更新する
    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required|max:12',
            'introduction' => 'nullable|max:140',
            'job' => 'required'


        ]);
        
        $file = $request->file('image');
        // $fileName = time()."jpg";
        // $image = Image::make($file);
        
        // $image->resize(300,null,function($constraint) {
        //     $constraint->aspectRatio();
        // });
        
        // $file_path= 'images';//.$fileName;
        // $image->save(public_path().$file_path);
        // S3に接続
        $path = Storage::disk('s3')->putFile('images', $file, 'public');

       
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
       
         // ログイン中に画像を表示し保存する
            $user->image =$path;
            $user->name = $request->name;
            $user->introduction = $request->introduction;
            $user->job = $request->job;
            $user->save();
        
        return redirect('/');
    }
}

