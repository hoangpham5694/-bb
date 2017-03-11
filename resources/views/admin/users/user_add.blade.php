@extends('admin.master')
@section('title','Thêm thành viên')
@section('content')
		<form action="" method="POST" style="width: 650px;">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Thêm thành viên</legend>
				<span class="form_label">Username:</span>
				<span class="form_item">
					<input type="text" name="txtUsername"  class="textbox" />
				</span><br />
						<span class="form_label">Name:</span>
				<span class="form_item">
					<input type="text" name="txtName"  class="textbox" />
				</span><br />

				
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
					<select name="selectRole" >
						@if(Auth::user()->role == 1)
  <option value="1"  >Super Admin</option>
  <option value="2" >Admin</option>
						@endif

  <option value="3" >Developer</option>
</select>
					
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnUserEdit" value="Thêm thành viên" class="button" />
				</span>
			</fieldset>
		</form>    
@endsection