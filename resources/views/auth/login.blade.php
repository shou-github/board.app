@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <div style="margin-top:20px;">
            {!! link_to_route('signup.get', '新規登録ページへ', [], ['class' => 'btn btn-primary']) !!}
                </div>

        </div>
    </div>
@endsection
