

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


                <form action="" method="post">
                        <input type="text" hidden value="{!! asset('public/')!!}" id="rooturl">
 
                    </form>
                    <script>
                    var API = "http://bigboomapp.dev:8080/";

                    function playgame(){
    filldata();
}

                    </script>
<button onclick="playgame()">click me</button>

<div style="width:660px; height: 400px; position:relative">
    
	<img id="bgimage" style="width:100%; position: absolute;" src="" alt="">
	<img style="border-radius: 50%; position: absolute; z-index:1; width: 50px; height:50px; top:8%; left:10%" src="" alt="">
	<img id="avt" style="border-radius: 50%; position: absolute; z-index:1; width: 30%; height:40%; top:0px; left:10%" src="" alt="">
	<span id="text" style="position: absolute;
    z-index: 1;
    width: 20%;
    top: 30px;
    left: 15%;
    text-align: center;
    font-size: 18px;
    "></span>
</div>

<div id="cand"></div>
<script>
var name= "";
var gender ="";
var avt = "";
    function getuser(handleData){
         $.ajax({ 
        type: 'GET', 
        url: API + 'facebook/getuser', 
        data: { get_param: 'value' }, 
        success: function (data) { 
             handleData(data); 
         //   return data;
           // console.log(data);
           // console.log(data.user.gender);
           // name = data.name;
           // gender = data.user.gender;
          //  avt= data.avatar;
           // var names = data
           // $('#cand').html(data);
        }
    });

    }

   function filldata(){
var url = $("#rooturl").val();
//console.l og(url);
getuser(function(output){

data = [1, 2, 4,5, 6, 8, 9, 10, 11, 12, 13, 14, 15,  16];
    
    data1 = [
        "Cây anh đào",
        "Cây dại",
        "Cây cỏ lau",
        "Cây lá phong",
        "Cây Baobab",
        "Cây Sồi",
        "Cây hoa Tử Đằng",
        "Cây Táo",
        "Cây Tre",
        "Cây Tùng",
        "Cỏ May",
        "Cây hồng leo",
        "Bồ công anh",
        "Cây thông",
    ];
    

    randD = Math.floor((Math.random() * data.length));

var text = output.name + data1[randD];
$("#text").html(text);





});

$("#bgimage").attr("src", url+"/mh94_apps/tencuaban/trump.jpg");


}

    </script>