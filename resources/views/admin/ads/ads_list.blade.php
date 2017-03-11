@extends('admin.master')
@section('title','Quảng lí quảng cáo')
@section('content')
<a href="add">Thêm mã quảng cáo</a>
		<table class="list_table">
			<tr class="list_heading">
				<td class="id_col">ID</td>
				<td>Tên quảng cáo</td>
	
				<td class="action_col">Quản lý?</td>
			</tr>

            @foreach($data_ads as $ads)
                <tr class="list_data">
                <td class="aligncenter">{{ $ads["id"] }}</td>
                <td class="list_td aligncenter">{!! $ads["name"] !!}</td>


                <td class="list_td aligncenter">
                    <a href="edit/{{ $ads["id"] }}"    ><img src="{!! asset('public/mh94_admin/templates/images/edit.png')!!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href="" onclick="return xacnhanxoa('Bạn có chắc muốn xóa Ads này không',{{ $ads["id"] }},'{!! url('adminsites/ads/delete') !!}');" ><img src="{!! asset('public/mh94_admin/templates/images/delete.png')!!}" /></a>
                </td>
            </tr>
            @endforeach



		</table>

@endsection