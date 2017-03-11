@extends('admin.master')
@section('title','Thêm quảng cáo')
@section('content')
		<form action="" method="POST"  style="width: 650px;">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Thêm ads</legend>
				
				<span class="form_label">Id ads:</span>
				<span class="form_item">
					<input type="number" name="txtID" class="textbox" />
				</span><br />
				<span class="form_label">Tên ads:</span>
				<span class="form_item">
					<input type="text" name="txtName" class="textbox" />
				</span><br />
		

								<span class="form_label">JS Code:</span>
				<span class="form_item">
					<textarea name="txtJs" rows="20" cols="100"  id="jscode" ></textarea>
				</span><br />

				
			
				<span class="form_item">
					<input type="submit" name="btnAdd" value="Thêm ads" class="button" />
				</span>
			</fieldset>
		</form>



@endsection