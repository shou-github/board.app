<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザ詳細タブ --}}
    <li class="nav-item" style="background: linear-gradient(to right, #FFCCFF, #FF367F);">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            投稿
            <span class="badge badge-dark">{{ $user->boards_count }}</span>
        </a>
    </li>

    {{-- フォロー一覧タブ --}}
    <li class="nav-item" style="background: linear-gradient(to right, #77FFFF, #5D99FF);">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            フォロー中
            <span class="badge badge-primary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- フォロワー一覧タブ --}}
    <li class="nav-item" style="background: linear-gradient(to right, #99FF00, #00FF7F);">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            フォロワー
            <span class="badge badge-success">{{ $user->followers_count }}</span>
        </a>
    </li>
    <li class="nav-item" style="background:#FFFF33;">
        <a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
            お気に入り
            <span class="badge badge-warning">{{ $user->favorites_count }}</span>
        </a>
    </li>
</ul>