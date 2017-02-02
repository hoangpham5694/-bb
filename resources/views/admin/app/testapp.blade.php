

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


                <form action="" method="post">
                        <input type="text" hidden value="{!! asset('public/')!!}" id="rooturl">
 
                    </form>
                    <script>
                    var appurl = "{!! $appurl !!}";
                    var API = "{!! asset('/')!!}";

                    function playgame(){
    filldata();
}

                    </script>
<button onclick="playgame()">click me</button>
	<a class="btn clearfix" href="{!! url('facebook/redirect')!!}" target="_blank">Đăng nhập fb</a>
<div style="width:710px; height: 400px; border: solid gray 1px">
    
{!! $htmlcode !!}

</div>

<div id="cand"></div>
{!! $jscode !!}
