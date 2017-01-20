

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
    

<div class="ContentGame" id="canvan" style="display: block;">
    <img class="bg" src="">

    <!--<img class="avt"/>


    <div class="txt t1"></div>
    <div class="txt t2"></div>
    <div class="name"></div>-->
    <div class="nd"></div>

</div>



</div>

<div id="cand"></div>
<style>
    /*  @font-face {
          font-family: f1;
          src: url('//www.appnhe.com/data/fb/font/SVN-Avo.ttf');
      }*/

    /*
        #contentElement {
            height: 530px !important;
        }*/

    .bg {
        width: 100%;
        position: relative;
        z-index: 1;
        height: 450px;
    }

    .ContentGame {
        width: 100%;
        position: relative;
        background-color: #fff;
    }

    .nd {
        position: absolute;
        top: 128px;
        left: 49px;
        /* right: 1px; */
        width: 51%;
        color: #fff;
        font-size: 25px;
        z-index: 1;
        line-height: 43px;
        font-family: 'Roboto', sans-serif;

    }

    .name {
        position: absolute;
        top: 59%;
        /* color: #f50551; */
        z-index: 3;
        left: 87px;
        font-weight: bold;
        width: 22%;
        font-size: 18px;
        font-family: f1;
    }

    .txt {
        position: absolute;
        top: 14%;
        z-index: 3;
        font-size: 26px;
        color: #fff;
        width: 100%;
        font-weight: bold;
        line-height: 31px;
        text-transform: uppercase;
        font-family: f1;
    }

    .avt {
        position: absolute;
        top: 120px;
        left: 94px;
        width: 146px;
    }

    .des {
        margin-top: 7px;
        font-size: 21px;
    }

    /*INPUT PANEL*/
    .inputForm {
        margin: auto;
        padding: 40px 20px 20px 20px;
        font-size: 18px !important;
        max-width: 450px !important;
        background-color: #fff;
    }

    #submitBtn {
        text-align: center;
    }

    #question2, #question3, #question4, #question5 {
        display: none;
    }

    .inputForm label {
        font-size: 18px !important;
    }

    .inputForm segment {
        padding: 5px;
    }

    .inputForm .ui.toggle.checkbox .box:before, .inputForm .ui.toggle.checkbox label:before {
        background: rgba(218, 44, 131, 0.85);
    }

    /*INPUT PANEL*/

    @media screen and (max-width: 750px) {
        .des {
            margin-top: 1vw;
            font-size: 4vw;
        }

        /*  #contentElement {
              height: 330px !important;
          }*/
    }

</style>


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

var dataPic = [1, 2, 3, 4, 5, 6];
    var dataM = [];
    dataM[1] = 
        "Ta mới ra đời đã bị thiên hạ chê xấu tơi bời, chỉ có thằng zzz là chưa thấy nói gì. Người tử tế như nó chắc chắn năm nay sẽ rất thành công :''>"
    ;
    dataM[2] = 
        "Tôi cảm thấy vô cùng hoang mang hoảng hốt trước nhan sắc tuyệt vời của anh zzz !!!<br> 2017 này anh sẽ có nhiều cô theo lắm đấy !!!"
;
    
    dataM[3] =
        "Thằng zzz lương thiện nà, không rảnh nách ngồi chế ảnh bêu xấu ta, năm nay phù hộ ngươi cho có người yêu đẹp lồng lộn như ta luôn!"
    ;
    dataM[4] = 
        "zzz rất tốtnhưng anh rất tiếc. 2017 này mày lại tiếp tục kiếp làm anh trai, có rất nhiều em gái nhưng không nhai được em nào =)))"
    ;
    dataM[5] = 
        "why?? Tại sao các ngươi cứ chửi ta xấu hoài vậy?? Sống tốt đời đẹp đạo, đẹp trai lai láng, ai cũng mến yêu như zzz có phải tốt hơn ko??"
    ;
    dataM[6] = 
        "Ta đây tuy xấu bẩm sinh nhưng lúc gặp thằng zzz cũng thấy an ủi phần nào. Thấy bản mặt nó còn sai gấp mấy chục lần mặt ta :))"
    ;

    dataF = [];
    dataF[1] = [
        "Ta mới ra đời đã bị thiên hạ chê xấu tơi bời, chỉ có con zzz là chưa thấy nói gì. Người tử tế như nó chắc chắn năm nay sẽ rất thành công :''>",
        "Ta là Rồng Pikachu, ta tuyên bố năm nay đứa nào bắt nạt zzz ta sẽ phù phép cho đứa đó mang bản mặt giống y như ta!",
        "Năm nay là năm con gà nhưng chị zzz sẽ thăng hoa như rồng, ta xin cam đoan điều đó ^^"
    ];
    dataF[2] = [
        "Phận là con Rồng, chưa một lần yêu ai, nhìn về em zzz mà thấy tim bỗng đập bùm bùm!"

    ];
    dataF[3] = [
        "Con zzz lương thiện nà, không rảnh nách ngồi chế ảnh bêu xấu ta, năm nay phù hộ ngươi cho có người yêu đẹp lồng lộn như ta luôn!",
        "Sau tất cả ta thấy zzz là đứa xinh gái tốt tính nhất mà ta từng gặp, ta sẽ phù hộ cho nó thông minh hơn, trai bu nhiều hơn",
        "Ba tao làm Rồng xấu bome mà còn yêu được mẹ tao là Pikachu xinh đẹp, thì 2017 này một người xinh gái như mày chắc chắn sẽ có gấu zzz ạ !!!"
    ];
    dataF[4] = [
        "Tụi bây hết chuyện làm hay sang tối ngày so tao với mấy tượng đài nhan sắc như zzz??? ok, tao ổn, ổn lắm!!"

    ];
    dataF[5] = [
        "why?? Tại sao các ngươi cứ chửi ta xấu hoài vậy?? Sống tốt đời đẹp đạo, đẹp trai lai láng, ai cũng mến yêu như zzz có phải tốt hơn ko??",
        "Sao cuộc đời lại bất công đến vậy? đã sinh ra zzz với vẻ đẹp hoàn hảo sao còn một con rồng xấu thấy mệ nội như ta??"
    ];
    dataF[6] = [
        "Ta đây tuy xấu bẩm sinh nhưng lúc gặp con zzz cũng thấy an ủi phần nào. Thấy bản mặt nó còn sai gấp mấy chục lần mặt ta :))",
        "zzz này, có 1 tin tốt và 1 tin xấu cho mày trong năm 2017 !!<br> 1. Có gấu<br>2. Gấu mày có nhan sắc y như tao vậy nè"


    ];
var dataPic = [1, 2, 3, 4, 5, 6];

    var rand_bg = Math.floor(Math.random() * dataPic.length);

    randD = Math.floor((Math.random() * dataM.length));
console.log(randD);
var text =  dataM[randD];
console.log(text);
text = text.replace("zzz", output.name);

$(".nd").html(text);



 $('.bg').attr('src', '//www.appnhe.com/data/fb/55_rong/images/' + dataPic[rand_bg] + '.jpg');

});





}

    </script>