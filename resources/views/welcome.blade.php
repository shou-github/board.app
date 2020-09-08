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
        <div class="center jumbotron" style="padding:43px; background:url(img/ocean.jpg);　center no-repeat; background-size: cover;">
            <div class="text-center">
                <h1 style="color: #00FF00;-webkit-text-stroke: 1px white; font-weight:bold; font-size:44px; font-style: italic;">Board appにようこそ！</h1>
                <p style="color: white; -webkit-text-stroke: 1px black; font-weight:bold; font-size:22px; margin-top:40px;">本アプリでは投稿した文章を「お気に入り」にしたり、文字書く際に便利な文字数カウントなど多彩な機能を実装しております</p>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '新規登録ページへ', [], ['class' => 'btn btn-lg btn-primary']) !!}
                <!--ログインページへのリンク-->
            <div style="float:right; width:50%">{!! link_to_route('login', 'ログインページへ', [], ['class' => 'btn btn-lg btn-success']) !!}</div>
            </div>
        </div>
    @endif
@endsection

