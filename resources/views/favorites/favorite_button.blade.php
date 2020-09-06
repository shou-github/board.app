@if (Auth::user() -> is_favorites($board->id))
        {{-- お気に入りーボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $board->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入りを外す', ['class' => "btn btn-danger Default"]) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $board->id]]) !!}
            {!! Form::submit('お気に入り', ['class' => "btn btn-success Default"]) !!}
        {!! Form::close() !!}
    @endif