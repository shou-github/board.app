@extends('layouts.app')

@section('content')
    {!! Form::model($board, ['route' => ['boards.update', $board->id], 'method' => 'put']) !!}
    
        <div class="form-group">
            <div class="form-group" style="font-size:30px; margin-top:30px; font-weight:bold;">  

            <h1 style="text-align:center; font-weight:bold; font-size:50px; font-style:oblique; color: #1E90FF;-webkit-text-stroke: 1px white;">編集ページ</h1>

        </div>
        
       
        <!--音声読み上げ機能-->
        <div class="form-inline float-right" style="font-size:30px;">
                    <p>文字数：</p>
                    <p id="inputlength">0</p>
        </div>
                <p style="font-size:30px;"> 
                    <button class="btn" style="background-color:#2C7CFF; color:white;" id="button1" type="button"><i class="fas fa-volume-up"></i> 英語</button>
                    <!--日本語-->
                    <button class="btn" style="background-color:#FF6600; color:white;" id="button2" type="button"><i class="fas fa-volume-up"></i> 日本語</button>
                    <!--読み上げ中止-->
                    <button class="btn" style="background-color:red; color:white;" id="button3" type="button"><i class="fas fa-volume-mute"></i> 停止</button>
                        
                    <button id="tweet" class="btn" style="background-color:#00aced; color:white;" type="button"><i class="fab fa-twitter"></i> ツイート</button>
                </p>
                
        <textarea contenteditable class="form-control" onkeyup="ShowLength(value);" name="content" rows="4" id="content">{{ old('content', $board->content) }}</textarea><br>
        {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
{!! Form::close() !!}

    

@endsection
