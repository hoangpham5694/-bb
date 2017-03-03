$(document).ready(function(){
	$(".result_msg, .error_msg").delay(2000).slideUp();
});

function xacnhanxoa (msg, appId, url){
	if(window.confirm(msg)){
		console.log(url+appId);
		$.get(url+"/"+appId, function(data, status){
        	location.reload();
        	alert(status+"\n"+data);
    	});
		
	}
	return false;
}