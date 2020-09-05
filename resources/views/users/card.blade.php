<div class="card text-center">
    <div class="card-header" style="background-color:#000080;">
        <h3 class="card-title" style="color:white;">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}

    @if($user->image == null)
        <img class="rounded img-fluid" style="width:180px; height:170px;" src="{{ Gravatar::get($user->email)}}" alt="">
        <!--ログインしていない-->
    @else
        <img class="rounded img-fluid" style="width:180px; height:170px;" src="{{ Storage::disk('s3')->url($user->image) }}">
    @endif
        
        <form method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!--downloadから画像を選択するボタン-->
                <input type="file" name="image">
            <!--選択した画像を表示させるボタン-->
            <div class="form-submit" style="text-align: center;">
                <button class="btn" style="background-color:blue; color:white;　text-align: center;" type="submit">変更</button>
            </div>
        </form>
    </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')