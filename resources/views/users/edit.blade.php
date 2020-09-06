@extends('layouts.app')

@section('content')
            <div class="text-center center jumbotron offset-sm-1 col-sm-11"  style="padding:30px;">
                <h1 style="font-size:30px;">プロフィール編集</h1>
            </div>
    <div class="row">
        <div class="offset-sm-4 col-sm-8">

            <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
            <div class="form-name">
              <label for="name" style="font-weight:bold; font-size:30px;" class="form-name">名前</label>
              <input type="text" class="col-sm-4 form-control" style="margin-bottom:30px;" value="{{ old('name', $user->name) }}" name="name">
            </div>
            
            <div class="form-image">
                <label for="img" style="font-weight:bold; font-size:30px;">アイコン画像</label><br>
                <input type="file" style="margin-bottom:30px;" name="image" id="img">
            </div>
            
            <div class="form-image">
                <label for="introduction" style="font-weight:bold; font-size:30px;">自己紹介</label><br>

                <textarea name="introduction" rows="5" cols="40">{{ old('introduction', $user->introduction) }}</textarea>
            </div>
            
                <div class="form-submit">
                 <button class="btn" style="background-color:blue; color:white;" type="submit">編集する</button>
                </div>
                
        </form>
      </div>
      </div>
@endsection

