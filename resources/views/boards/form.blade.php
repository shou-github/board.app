{!! Form::open(['route' => 'boards.store']) !!}
    <div class="form-group">
        <div class="form-group" style="font-size:30px; margin-top:30px; font-weight:bold;">  
                   
        <div class="text-center center jumbotron" style="padding:43px; background:url(img/island.jpg);　center no-repeat; background-size: cover;">
            <h1 style="color: #00FF00;-webkit-text-stroke: 1px white; font-weight:bold;">投稿ページ</h1>
        </div>
    </div>
        
        

        <!--音声読み上げ機能-->
        <div class="form-inline float-right" style="font-size:30px;">
            <p>文字数：</p>
            <p id="inputlength">0</p>
        </div>
                <!--twitter共有-->
                <button id="tweet" class="btn" style="background-color:#00aced; color:white;" type="button"><i class="fab fa-twitter"></i> ツイート</button>
            
                
        <textarea contenteditable class="form-control" onkeyup="ShowLength(value);" name="content" rows="4" id="content">{{ old('content') }}</textarea><br>
        <div style="margin-bottom:20px;">{!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}</div>

{!! Form::close() !!}

<script>
        
         // twitter共有機能
        document.getElementById("tweet").addEventListener('click', function(event) {
        event.preventDefault();
        var left = Math.round(window.screen.width / 2 - 275);
        var top = (window.screen.height > 420) ? Math.round(window.screen.height / 2 - 210) : 0;
        window.open(
            "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.getElementById("content").value),
            null,
            "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,left=" + left + ",top=" + top);
    });
</script>