@extends('admin.master')
@section('title','Thêm danh mục')
@section('content')
		<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Thêm app</legend>
				
				<span class="form_label">Tên app:</span>
				<span class="form_item">
					<input type="text" name="txtTitle" class="textbox" />
				</span><br />
				<span class="form_label">Đường dẫn:</span>
				<span class="form_item">
					<input type="text" name="txtUrl" class="textbox" />
				</span><br />
		
				<span class="form_label">Mô tả:</span>
				<span class="form_item">
					<textarea name="txtDes" rows="8" class="textbox"></textarea>
				</span><br />
								<span class="form_label">HTML Code:</span>
				<span class="form_item">
					<textarea name="txtHTML" rows="8" class="textbox"></textarea>
				</span><br />
								<span class="form_label">JS Code:</span>
				<span class="form_item">
					<textarea name="txtJs" rows="8" class="textbox"></textarea>
				</span><br />
				<span class="form_label">Hình:</span>
				<span class="form_item">
					<input type="file" name="inputImg" class="textbox" />
				</span><br />
	
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnNewsAdd" value="Thêm tin" class="button" />
				</span>
			</fieldset>
		</form>
@endsection