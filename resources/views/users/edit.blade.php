@extends('layouts.app')

@section('content')
        <div class="offset-sm-1 col-sm-11"  style="padding:30px;">
            <h1 style="font-size:45px; text-align:center; color: blue;-webkit-text-stroke: 1px white; font-weight:bold; font-style: italic;">プロフィール編集</h1>
        </div>

        <div class="row">
            <div class="offset-sm-4 col-sm-8">
        <a class="btn btn--orange btn--cubic btn--shadow;"  href="/">戻る</a>

        <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
            <div class="form-name">
              <label for="name" style="font-weight:bold; font-size:30px; margin-top:30px;" class="form-name">名前(10文字まで）</label>
              <input type="text" class="col-sm-6 form-control" style="margin-bottom:30px;" value="{{ old('name', $user->name) }}" name="name">
            </div>
            
            <div class="form-image">
                <label for="img" style="font-weight:bold; font-size:30px;">アイコン画像</label><br>
                <input type="file" style="margin-bottom:30px;" name="image" id="img">
            </div>
            
            <div class="form-job">
                <label style="font-weight:bold; font-size:30px;" for="job">職業</label><br>
                <select name="job" style="margin-bottom: 30px;">
              @foreach(config('job') as $key => $job)
                <option value="{{ $key }}">{{ $job }}</option>
              @endforeach
                </select>
            </div>
            
            <div class="form-inline float-right" style="font-size:20px; padding-right:252px;">
                <p>文字数：</p>
                <p id="inputlength">0</p>
            </div>
            
            
            <div class="form-image">
                <label for="introduction" style="font-weight:bold; font-size:30px;">自己紹介(140字まで)</label><br>
                <textarea name="introduction" onkeyup="ShowLength(value);" rows="5" cols="41" style="margin-bottom:30px;">{{ old('introduction', $user->introduction) }}</textarea>
            </div>
            
            <div class="form-submit">
                <button class="btn" style="background-color:blue; color:white; margin-bottom:50px; width:50%;"  type="submit">編集する</button>
            </div>
                
        </form>
      </div>
      </div>
@endsection

