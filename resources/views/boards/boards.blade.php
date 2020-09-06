@if (count($boards) > 0)
    <ul class="list-unstyled"  style="background:#D9E5FF;">
        @foreach ($boards as $board)
            <li class="media mb-3" style="border-bottom:1px solid #84b2e0;">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    @if($board->user->image == null)
                      <img style="border-radius:50%; margin-right:30px; width:70px; height:70px; margin:20px;" src="{{ Gravatar::get($board->user->email) }}" alt="">
                      <!--ログインしていない-->
                    @else
                      <img style="border-radius:50%; margin-right:30px;  width:70px; height:70px; margin:20px;" src="{{ Storage::disk('s3')->url($board->user->image) }}">
                    @endif
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        <div style="font-size:30px;">{!! link_to_route('users.show', $board->user->name, ['user' => $board->user->id]) !!}</div>
                        <span class="text-muted">投稿日時 {{ $board->updated_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p style="font-size:25px;">{!! nl2br(e($board->content)) !!}</p>
                        
                    <div style="margin:15px; display:flex; justify-content: space-evenly;">
                        {{-- お気に入りボタン --}}
                        @include('favorites.favorite_button')
                        @if (Auth::id() == $board->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! link_to_route('boards.edit', '編集', ['board' => $board->id], ['class' => 'btn btn-primary']) !!}
                            {!! Form::open(['route' => ['boards.destroy', $board->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn']) !!}
                            {!! Form::close() !!}
                        @endif
                        
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $boards->links() }}
@endif