@extends('admin.master')
@section('title','Sửa App')
@section('content')
		<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Sửa ads</legend>
				
				<span class="form_label">Id ads:</span>
				<span class="form_item">
					<input type="number" name="txtID" value="{!! $data['id'] !!}" class="textbox" />
				</span><br />
				<span class="form_label">Tên ads:</span>
				<span class="form_item">
					<input type="text" name="txtName" value="{!! $data['name'] !!}" class="textbox" />
				</span><br />
		

								<span class="form_label">JS Code:</span>
				<span class="form_item">
					<textarea name="txtJs" rows="20" cols="100"  id="jscode" >{!! $data['code'] !!}</textarea>
				</span><br />

				
			
				<span class="form_item">
					<input type="submit" name="btnAdd" value="Sửa ads" class="button" />
				</span>
			</fieldset>
		</form>



@endsection