@extends('admin.master')
@section('title','Thêm danh mục')
@section('content')
<a href="add">Thêm app</a>
		<table class="list_table">
			<tr class="list_heading">
				<td class="id_col">ID</td>
				<td>Tiêu Đề</td>
				<td>URL</td>
				<td>Thời Gian</td>
				<td class="action_col">Quản lý?</td>
			</tr>

            @foreach($dataApp as $app)
                <tr class="list_data">
                <td class="aligncenter">{{ $app["id"] }}</td>
                <td class="list_td aligncenter">{!! $app["title"] !!}</td>
                <td class="list_td aligncenter">{!! $app["appurl"] !!}</td>
                <td class="list_td aligncenter">
                    <?php \Carbon\Carbon::setLocale('vi');?>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($app["created_at"]))->diffForHumans() !!}

                </td>
                <td class="list_td aligncenter">
                    <a href="edit/{{ $app["id"] }}"    ><img src="{!! asset('public/mh94_admin/templates/images/edit.png')!!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href="delete/{{ $app['id'] }}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa App này không');" ><img src="{!! asset('public/mh94_admin/templates/images/delete.png')!!}" /></a>
                </td>
            </tr>
            @endforeach



		</table>
        Trang 

            @for ($i = 1; $i < $numPages; $i++)
                @if ($i == $page)
                    {{ $i }}
                @else
                    <a href="/adminsites/app/list/{{ $i }}" > {{ $i }} </a>
                @endif
            
            @endfor
@endsection