@if (Auth::user() -> is_favorites($board->id))
        {{-- お気に入りーボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $board->id], 'method' => 'delete']) !!}
        <button type="submit" class="btn" style="font-size:30px; color: yellow;"><i class="fas fa-star"></i></button>
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $board->id]]) !!}
        <button type="submit" class="btn" style="font-size:30px; color: blue;"><i class="fas fa-star"></i></button>
        {!! Form::close() !!}
    @endif