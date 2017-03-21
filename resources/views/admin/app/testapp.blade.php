

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/html2canvas.js') ; ?>> </script>

                <form action="" method="post">
                        <input type="text" hidden value="{!! asset('public/')!!}" id="rooturl">
 
                    </form>
                    <script>
        $(document).ready(function($) {
                           $("#canvas").click(function(event) {
                                    html2canvas($(".game-result"), {
                                    
                                    
                                //  allowTaint: true,
                                //  userCORS:true,
                                    logging:true,
                                    proxy:"{!! asset('/') !!}/html2canvasproxy.php",
    "onrendered": function(canvas) {
 
       
        var url = canvas.toDataURL("image/png");
      //  window.open(url, "_blank");
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       




    }

                                }).then(function(canvas){
                                  
                                 var url = canvas.toDataURL("image/png");
                                $("#cand").attr({
                                    src: url
                                });


                            });
                           });
                    });
                    var appurl = "{!! $appurl !!}";
                    var API = "{!! asset('/')!!}";

                    function playgame(){
    filldata();
}

                    </script>
<button onclick="playgame()">click me</button>
<button id="canvas">Canvas</button>
	<a class="btn clearfix" href="{!! url('facebook/redirect')!!}" target="_blank">Đăng nhập fb</a>
<div style="width: 730px; border: solid gray 1px" class="game-result">
    
{!! $htmlcode !!}
{!! $jscode !!}
</div>
<br><br>
<img src="" id="cand" alt="">

