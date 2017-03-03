@extends('dev.master')
@section('title','Sửa App')
@section('content')
		<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Sửa app</legend>
				<span class="form_label">Tên app:</span>
				<span class="form_item">
					<input type="text" name="txtTitle" class="textbox" value="{{ $data['title'] }}" />
				</span><br />
				<span class="form_label">Đường dẫn:</span>
				<span class="form_item">
					<input type="text" name="txtUrl" id="appurl" class="textbox" value="{{ $data['appurl'] }}" />
				</span><br />
		
				<span class="form_label">Mô tả:</span>
				<span class="form_item">
					<textarea name="txtDes" rows="8" class="textbox">{{ $data['description'] }}</textarea>
				</span><br />
		<span class="form_label">HTML Code:</span>
				<span class="form_item">
					<textarea name="txtHTML" id="htmlcode" rows="20" cols="100" >{{ $data['html'] }}</textarea>
				</span><br />
								<span class="form_label">JS Code:</span>
				<span class="form_item">
					<textarea name="txtJs" id="jscode" rows="20" cols="100" >{{ $data['script'] }}</textarea>
				</span><br />

				<span class="form_label">Hình hiện tại:</span>
				<span class="form_item">
					<img src="{!! asset('public/mh94_upload/appimages')!!}/{{ $data['image'] }}" width="100px" />
				</span><br />
				<span class="form_label">Hình :</span>
				<span class="form_item">
					<input type="file" name="inputImg" class="textbox" />
				</span><br />
						<span class="form_label"></span>
				<span class="form_item">
					<input type="button" id="btnTestApp" value="Chạy thử" class="button" />
				</span>
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnNewsEdit" value="Sửa" class="button" />
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
		$("#btnTestApp").click(function() {
			/* Act on the event */
			var url= "{!! asset('/')!!}" + "devsites/app/testapp";
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    			$.ajax({
								url:url,
								type:"POST",
								header:{
									'contentType': 'application/upload',
								},
								data:{ '_token': CSRF_TOKEN,
								title: "{{ $data['title'] }}",
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