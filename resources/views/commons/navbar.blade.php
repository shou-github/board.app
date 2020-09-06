<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: linear-gradient(to top, #66FFFF, #0066FF);">
      <!--ログイン中の動作-->
@if (Auth::check())
          <a class="navbar-brand" style="font-size:40px; font-weight:bold;" href="/"><i class="fas fa-share-square"></i> <?php $user = Auth::user(); ?>Board.app</a>
    
            <button type="button" class="navbar-toggler" style="background-color:orange;"  data-toggle="collapse" data-target="#nav-bar">
              <span class="navbar-toggler-icon"></span>
            </button>

           <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item" style="margin-top:25px;">{!! link_to_route('users.index', 'ユーザ一覧', [], ['class' => 'btn btn-success']) !!}</li>
                    <li class="nav-item dropdown">
                        
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    
                          
                    @if($user->image == null)
                      <img style="border-radius:50%;width:70px; height:70px;" src="{{ Gravatar::get($user->email) }}" alt="">
                      <!--ログインしていない-->
                    @else
                      <img style="border-radius:50%; width:70px; height:70px;" src="{{ Storage::disk('s3')->url($user->image) }}">
                    @endif
                  </a>
            <!--アイコンをクリックするとdropdownを表示させる-->
            <ul class="dropdown-menu dropdown-menu-right">
                
                <li class="dropdown-divider"></li>
                <li class="dropdown-item" style="text-align: center;"><a href="/" class="btn" style="background:blue; color:white;">トップページ</a></li>
                
                <li class="dropdown-divider"></li>
                <li class="dropdown-item" style="text-align: center;">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()],['class' => 'btn btn-info']) !!}</li>
                
                    <li class="dropdown-divider"></li>
                <li class="dropdown-item" style="text-align: center;">{!! link_to_route('users.edit', 'プロフィール編集', ['user' => Auth::id()],['class' => 'btn btn-danger']) !!}</li>
                      <!--ログアウトへのリンク-->
                      <li class="dropdown-item" onclick="return Logout_check()" style="text-align: center;">
                        {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'btn btn-secondary']) !!}
                      </li>
            </ul>
            </ul>

        @else
          <a class="navbar-brand" style="font-size:40px; font-weight:bold; color:white;" href="/"><i class="far fa-share-square"></i>Board.app</a>  
        @endif 
  </nav>
</header>



