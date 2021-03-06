<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>board.app</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        
        <!--favicon変更-->
        <link rel="shortcut icon" href="{{ secure_asset('favicon.ico') }}">
        <style>
            body::before {
              content: "";
              
              background: url({{ asset('sea.jpg') }}) no-repeat center center;
              background-blend-mode:lighten;
              background-size: cover;
              display: block;
              position: fixed;
              top: 0;
              left: 0;
              width: 100vw;
              height: 100vh;
              z-index: -1;
              transform: translateZ(0);
              
            background-color:rgba(255,255,255,0.6);
            }
            
            a.btn--orange {
              color: #fff;
              background-color: #eb6100;
              border-bottom: 5px solid #b84c00;
            }
            a.btn--orange:hover {
              margin-top: 3px;
              color: #fff;
              background: #f56500;
              border-bottom: 2px solid #b84c00;
            }
            a.btn--shadow {
              -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, .3);
              box-shadow: 0 3px 5px rgba(0, 0, 0, .3);
            }
        </style>
        
        <script language="JavaScript" type="text/JavaScript">
            
            // 削除する前の確認機能
            function Delete_check(){
                let checked = confirm("本当に削除しますか?");
                if (checked == true) {
                    return true;
            } else {
                    return false;
            }
            
        }
            // ログアウトする前の確認機能
            function Logout_check(){
                let checked = confirm("ログアウトしますか?");
                if (checked == true) {
                    return true;
            } else {
                    return false;
            }
        }
        </script>
        
    </head>
    
    <body>

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
        
        <script>
        // table検索機能
        
           (function(document) {
            'use strict';

        var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }

        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function(input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
            })(Array.prototype);
        
            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    LightTableFilter.init();
                }
            });
        
        })(document);
            
        
            // textareaの文字数表示
            function ShowLength( str ) {
	            str=str.replace(/\n/g, ""); 
                document.getElementById("inputlength").innerHTML = ""+ str.length ;
             }
             
            
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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
