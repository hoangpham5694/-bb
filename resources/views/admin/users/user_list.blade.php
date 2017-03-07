@extends('admin.master')
@section('title','Danh sách thành viên')
@section('content')
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
                     <a href="edit/{{ $item['id'] }}"    ><img src="{!! asset('public/mh94_admin/templates/images/edit.png')!!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href="delete/{{ $item['id'] }}"  ><img src="{!! asset('public/mh94_admin/templates/images/delete.png')!!}" /></a>
                </td>
            </tr>
            @endforeach
		</table>
@endsection