@extends('admin.master')
@section('title','Sửa thành viên')
@section('content')
		<form action="" method="POST" style="width: 650px;">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Sửa Thông Tin User</legend>
				<span class="form_label">Username:</span>
				<span class="form_item">
					<input type="text" name="txtUsername" value="{!! $data['username'] !!}" class="textbox" />
				</span><br />
						<span class="form_label">Name:</span>
				<span class="form_item">
					<input type="text" name="txtName" value="{!! $data['name'] !!}" class="textbox" />
				</span><br />

				<span class="form_label"></span>
				
				
				<span class="form_item">Chỉ nhập khi đổi mật khẩu</span> <br>
				<span class="form_label">Password:</span>
				

				<span class="form_item">
					<input type="password" name="txtPass"  class="textbox" />
				</span><br />
				<span class="form_label">Confirm password:</span>
				<span class="form_item">
					<input type="password" name="txtRepass"  class="textbox" />
				</span><br />
				<span class="form_label">Level:</span>
				<span class="form_item" >
					<select name="selectRole" <?php if(Auth::user()->role != 1){echo "disabled";} ?>>
  <option value="1" <?php if($data['role'] == 1){echo "selected";} ?> >Super Admin</option>
  <option value="2" <?php if($data['role'] == 2){echo "selected";} ?>>Admin</option>
  <option value="3" <?php if($data['role'] == 3){echo "selected";} ?>>Developer</option>
</select>
					
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnUserEdit" value="Sửa User" class="button" />
				</span>
			</fieldset>
		</form>    
@endsection