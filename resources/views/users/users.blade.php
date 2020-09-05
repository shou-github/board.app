@if (count($users) > 0)

    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <div>
@if($user->image == null)
                      <img style="border-radius:50%; margin-right:30px; width:70px; height:70px;" src="{{ Gravatar::get($user->email) }}" alt="">
                      <!--ログインしていない-->
                    @else
                      <img style="border-radius:50%; margin-right:30px;  width:70px; height:70px;" src="{{ Storage::disk('s3')->url($user->image) }}">
                    @endif                </div>
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif