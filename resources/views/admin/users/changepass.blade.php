@extends('admin.master')
@section('title','Đổi mật khẩu')
@section('content')
		<form action="" method="POST" style="width: 650px;">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Đổi mật khẩu</legend>
				<span class="form_label">Old-Password:</span>
				<span class="form_item">
					<input type="password" name="txtOldPass" class="textbox" />
				</span><br />
				<span class="form_label">Password:</span>
				<span class="form_item">
					<input type="password" name="txtNewPass" class="textbox" />
				</span><br />
				<span class="form_label">Confirm password:</span>
				<span class="form_item">
					<input type="password" name="txtReNewPass" class="textbox" />
				</span><br />
				
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnChangePass" value="Đổi mật khẩu" class="button" />
				</span>
			</fieldset>
		</form>    
@endsection