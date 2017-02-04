
/*
	function ajaxapp(url){
		 var url = API+ url;
         $("#gameplay").load(url, function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success"){
		//alert("External content loaded successfully!");
             //$('#modalEdit').modal('toggle');
            }
                
            if(statusTxt == "error"){
            	alert("Error: " + xhr.status + ": " + xhr.statusText);
            }
          });
       
};*/
function playgame(){
    filldata();
}

var toogle = true;
$(document).ready(function() {
    $(".search-panel-btn").click(function() {
        if(toogle){
            $(".search-panel").css("display","block");
            toogle = false;
        }else{
             $(".search-panel").css("display","none");
            toogle = true;
        }
       
       
    });
            $("#btn-goto-top").click(function() {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

});
