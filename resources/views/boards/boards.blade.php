@if (count($boards) > 0)
    <ul class="list-unstyled"  style="background:#D9E5FF;">
        @foreach ($boards as $board)
            <li class="media mb-3" style="border-bottom:1px solid #84b2e0;">
                <a href="{{ action('UsersController@show', $user->id) }}">
                    @if($board->user->image == null)
                      <img style="border-radius:50%; margin-right:30px; width:70px; height:70px; margin:20px;" src="{{ Gravatar::get($board->user->email) }}" alt="">
                      <!--ログインしていない-->
                    @else
                      <img style="border-radius:50%; margin-right:30px;  width:70px; height:70px; margin:20px;" src="{{ Storage::disk('s3')->url($board->user->image) }}">
                    @endif
                </a>
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        <div style="font-size:30px;">{!! link_to_route('users.show', $board->user->name, ['user' => $board->user->id]) !!}</div>
                        <span class="text-muted">投稿日時 {{ $board->updated_at }}</span>
                    </div>
                    
                    
                    
                    <div>
                        {{-- 投稿内容 --}}
                    <p style="font-size:25px;" name="content">{!! nl2br(e($board->content)) !!}</p>

                    <div style="display:flex; justify-content: space-evenly;">
                        
                <p style="font-size:30px;"> 
                    <button class="btn" style="background-color:#2C7CFF; color:white;" id="button1" type="button"><i class="fas fa-volume-up"></i> 英語</button>
                    <!--日本語-->
                    <button class="btn" style="background-color:#FF6600; color:white;" id="button2" type="button"><i class="fas fa-volume-up"></i> 日本語</button>
                    <!--読み上げ中止-->
                    <button class="btn" style="background-color:red; color:white;" id="button3" type="button"><i class="fas fa-volume-mute"></i> 停止</button>
                        
                    <button id="tweet" class="btn" style="background-color:#00aced; color:white;" type="button"><i class="fab fa-twitter"></i> ツイート</button>
                </p>
                        {{-- お気に入りボタン --}}
                        @include('favorites.favorite_button')
                        @if (Auth::id() == $board->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            <div style="margin-bottom:20px; padding-top:15px;">{!! link_to_route('boards.edit', '編集', ['board' => $board->id], ['class' => 'btn btn-primary']) !!}</div>
                            {!! Form::open(['route' => ['boards.destroy', $board->id], 'method' => 'delete']) !!}
                            <div onclick="return Delete_check()" style="margin-bottom:20px; padding-top:15px;">
                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn']) !!}</div>
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