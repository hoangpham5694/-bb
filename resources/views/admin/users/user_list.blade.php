@extends('admin.master')
@section('title','Danh sách thành viên')
@section('content')
<a href="{{ url('adminsites/user/add') }}">Thêm thành viên</a>
<select id="method" name="chon" style="float:right">
  <option value="all">Tất cả</option>
  <option value="superadmin">Chỉ SAdmin</option>
  <option value="admin">Chỉ Admin</option>
  <option value="dev">Chỉ Dev</option>

</select>
		<table class="list_table">
			<tr class="list_heading">
				<td class="id_col">STT</td>
				<td>Username</td>
				<td>Name</td>
                <td>Role</td>
				<td class="action_col">Quản lý?</td>
			</tr>
            @foreach($data as $item)
			<tr class="list_data">
                <td class="aligncenter">{!! $item["id"] !!}</td>
                <td class="list_td aligncenter">{!! $item["username"] !!}</td>
                <td class="list_td aligncenter">{!! $item["name"] !!}</td>
                <td class="list_td aligncenter">{!! $item["role"] !!}</td>
     
                <td class="list_td aligncenter">
                     <a href="{!! url('adminsites/user/edit') !!}/{{ $item['id'] }}"    ><img src="{!! asset('public/mh94_admin/templates/images/edit.png')!!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href="delete/{{ $item['id'] }}"  ><img src="{!! asset('public/mh94_admin/templates/images/delete.png')!!}" /></a>
                </td>
            </tr>
            @endforeach
		</table>

         <script>
                $(document).ready(function() {
                    $("#method").val("{{ $method }}");
                    $("#method").change(function(){
                        //alert($("#method").val());
                         url= "{!! url('adminsites/user/list/')!!}" + "/"+$("#method").val();
                        //alert(url);
                        window.location.replace(url);
                    });
                });
            </script>
@endsection