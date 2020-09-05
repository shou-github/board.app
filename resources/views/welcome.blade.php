@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('boards.form')
                {{-- 投稿一覧 --}}
                @include('boards.boards')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Boards</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
                <!--ログインページへのリンク-->
            <div style="float:right; width:50%">{!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}</div>
            </div>
        </div>
    @endif
@endsection

