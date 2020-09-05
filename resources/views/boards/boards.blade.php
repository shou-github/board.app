@if (count($boards) > 0)
    <ul class="list-unstyled">
        @foreach ($boards as $board)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    @if($board->user->image == null)
                      <img style="border-radius:50%; margin-right:30px; width:70px; height:70px;" src="{{ Gravatar::get($board->user->email) }}" alt="">
                      <!--ログインしていない-->
                    @else
                      <img style="border-radius:50%; margin-right:30px;  width:70px; height:70px;" src="{{ Storage::disk('s3')->url($board->user->image) }}">
                    @endif
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $board->user->name, ['user' => $board->user->id]) !!}
                        <span class="text-muted">posted at {{ $board->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($board->content)) !!}</p>
                        
                    <div>
                        @if (Auth::id() == $board->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['boards.destroy', $board->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        {{-- フォロー／アンフォローボタン --}}
                        @include('favorites.favorite_button')
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $boards->links() }}
@endif