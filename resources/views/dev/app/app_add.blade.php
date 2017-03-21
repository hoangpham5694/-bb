@extends('dev.master')
@section('title','Thêm danh mục')
@section('content')
		<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Thêm app</legend>
				
				<span class="form_label">Tên app:</span>
				<span class="form_item">
					<input type="text" id="txtTitle" name="txtTitle" class="textbox" />
				</span><br />
				<span class="form_label">Đường dẫn:</span>
				<span class="form_item">
					<input type="text" id="txtUrl" name="txtUrl" class="textbox" />
				</span><br />
		
				<span class="form_label">Mô tả:</span>
				<span class="form_item">
					<textarea name="txtDes" rows="8" class="textbox"></textarea>
				</span><br />
								<span class="form_label">HTML Code:</span>
				<span class="form_item">
					<textarea name="txtHTML" rows="20" cols="100" id="htmlcode" ></textarea>
				</span><br />
								<span class="form_label">JS Code:</span>
				<span class="form_item">
					<textarea name="txtJs" rows="20" cols="100"  id="jscode" ></textarea>
				</span><br />
				<span class="form_label">Hình:</span>
				<span class="form_item">
					<input type="file" name="inputImg" class="textbox" />
				</span><br />
					<span class="form_item">
					<input type="button" id="btnTestApp" value="Chạy thử" class="button" />
				</span>
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnNewsAdd" value="Thêm app" class="button" />
				</span>
			</fieldset>
		</form>

<div class="modal fade bs-example-modal-lg" id="ModalTestApp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Thử App</h4>
      </div>
      <div class="modal-body" id="ModalContent">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
     
      </div>
    </div>
  </div>
</div>
	<script>
	$(document).ready(function($) {
			$("#txtTitle").blur(function(){
				var username = '{!! Auth::user()->username!!}';
				var url = "photos/"+ username +"/";
			console.log($(this).val());
    var title = $(this).val();
     slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.toLowerCase(); 
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    $("#txtUrl").val(url+ slug);    
});
		$("#btnTestApp").click(function() {
			/* Act on the event */
			var url= "{!! asset('/')!!}" + "adminsites/app/testapp";
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    			$.ajax({
								url:url,
								type:"POST",
								header:{
									'contentType': 'application/upload',
								},
								data:{ '_token': CSRF_TOKEN,
								appurl : $('#appurl').val(),
								htmlcode: $("#htmlcode").val(),
								jscode: $("#jscode").val(),

								 },
								
								
								success: function (data) {console.log(data);

									$("#ModalContent").html(data);
									$("#ModalTestApp").modal('show');
								 },
								error: function (data) {console.log(data); },

							})  
		});
	});

	
	</script>

@endsection