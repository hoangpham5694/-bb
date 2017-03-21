<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
	<link rel    ="stylesheet" href="{!! asset('public/mh94_guest/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!! asset('public/mh94_admin/templates/css/styledev.css')!!}" />
	<meta name="csrf-token" content="{{ Session::token() }}"> 


<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script ype="text/javascript" src="{!! asset('public/elfinder/js/elfinder.full.js')!!}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('public/elfinder/css/theme.css')!!}">
    <script src  ="<?php echo asset('public/mh94_guest/js/lib/bootstrap.min.js') ; ?>"></script>
	<title>Test app</title>

 <script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/html2canvas.js') ; ?>> </script>
</head>

<body>
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
                    var appurl = "{!! $data['appurl'] !!}";
                    var API = "{!! asset('/')!!}";

                    function playgame(){
    filldata();
}

                    </script>
<button onclick="playgame()">click me</button>
<button id="canvas">Canvas</button>
	<a class="btn clearfix" href="{!! url('facebook/redirect')!!}" target="_blank">Đăng nhập fb</a>
<div>
   <div style="width:730px; border: solid gray 1px" class="game-result">
       {!! $data['html'] !!}
       {!! $data['script'] !!}
   </div>


</div>

<img src="" id="cand" alt="">
    



</body>
</html>