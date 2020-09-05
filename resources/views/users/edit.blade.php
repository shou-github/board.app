



@extends('layouts.app')

@section('content')
           

            <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
            <div class="form-name">
              <label for="name" style="font-weight:bold; font-size:30px;" class="form-name">名前</label>
              <input type="text" class="col-sm-4 form-control" style="margin-bottom:30px;" value="{{ $user->name }}" name="name">
            </div>
            
            <div class="form-image">
                <label for="img" style="font-weight:bold; font-size:30px;">アイコン画像</label><br>
                <input type="file" style="margin-bottom:30px;" name="image" id="img">
            </div>
            
            <div class="form-image">
                <label for="img" style="font-weight:bold; font-size:30px;">自己紹介</label><br>

                <textarea name="introduction" rows="4" cols="40">{{ $user->introduction }}</textarea>
            </div>
            
                <div class="form-submit">
                 <button class="btn" style="background-color:blue; color:white;" type="submit">編集する</button>
                </div>
                

        </form>

@endsection

