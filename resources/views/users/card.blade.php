<div class="card text-center">
    <div class="card-header" style="background-color:#000080;">
        <h3 class="card-title" style="color:white; font-size:36px;"><i class="far fa-id-card"></i> {{ $user->name }}</h3>
        
    </div>
    <div class="card-body">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}

    @if($user->image == null)
        <img class="rounded img-fluid" style="width:200px; height:180px;" src="{{ Gravatar::get($user->email)}}" alt="">
        <!--ログインしていない-->
    @else
        <img class="rounded img-fluid" style="width:200px; height:180px;" src="{{ Storage::disk('s3')->url($user->image) }}">
    @endif
        
        <label for="introduction" style="font-weight:bold; font-size:30px;">自己紹介</label>

        <div class="text-left">{{ $user->introduction }}</div>
       
        
    </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')