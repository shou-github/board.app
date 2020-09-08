@if (count($users) > 0)
        
            <i class="fas fa-search mr-2" style="font-size:30px;"></i><input type="search" style="width:250px;  margin-right:50px;" class="light-table-filter mb-3" data-table="order-table" placeholder="検索ワードを入力"/>
                      <a class="btn btn--orange btn--cubic btn--shadow;" href="/">戻る</a>

        <table class="order-table text-center" style="width:50%;">
            

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <a href="{{ action('UsersController@show', $user->id) }}">
                            @if($user->image == null)
                              <img style="border-radius:50%; width:70px; height:70px; margin-bottom:15px;  margin-top:15px;" src="{{ Gravatar::get($user->email) }}">
                              <!--ログインしていない-->
                            @else
                              <img class="button" style="border-radius:50%; width:70px; height:70px; margin-bottom:15px;  margin-top:15px;" src="{{ Storage::disk('s3')->url($user->image) }}">
                            @endif 
                        </a>
                    </td>
                    <!--メモのid表示-->
                    <td style="font-size:30px; margin-bottom:30px;">{{ $user->name }}</td>
                    <!--メモのタイトル表示-->

                    {{-- フォロー／アンフォローボタン --}}
                    <td>@include('user_follow.follow_button')</td>
                    <!--メモ削除ボタン-->
                </tr>
                @endforeach
            </tbody>
        </table>
@endif