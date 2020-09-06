@if (count($users) > 0)
        <div class="text-center center jumbotron" style="padding:30px;">
            <h1>ユーザ一覧</h1>
        </div>
            <i class="fas fa-search mr-2" style="font-size:30px;"></i><input type="search" style="width:250px;" class="light-table-filter mb-3" data-table="order-table" placeholder="検索ワードを入力"/>
        <table class="order-table text-center" style="width:100%; height:100px;">
            
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                    @if($user->image == null)
                      <img style="border-radius:50%; width:70px; height:70px; margin-bottom:15px;  margin-top:15px;" src="{{ Gravatar::get($user->email) }}" alt="">
                      <!--ログインしていない-->
                    @else
                      <img style="border-radius:50%; width:70px; height:70px; margin-bottom:15px;  margin-top:15px;" src="{{ Storage::disk('s3')->url($user->image) }}">
                    @endif 
                    </td>
                    <!--メモのid表示-->
                    <td style="font-size:30px; margin-bottom:30px;">{{ $user->name }}</td>
                    <!--メモのタイトル表示-->
                    <td>{!! link_to_route('users.show', 'プロフィール', ['user' => $user->id],['class' => 'btn btn-info']) !!}</td>
                    <!--メモ削除ボタン-->
                    
                @endforeach
            </tbody>
        </table>
@endif