@extends('dev.master')
@section('title','Thêm danh mục')
@section('content')
<a href="{{ url('devsites/app/add') }}">Thêm app</a>
<select id="method" name="chon" style="float:right">
  <option value="all">Tất cả</option>
  <option value="exceptdecide">App đang chờ và đã duyệt</option>
  <option value="accept">App đã duyệt</option>
  <option value="decide">App không duyệt</option>
  <option value="waiting">App đang chờ</option>
</select>
		<table class="list_table">
			<tr class="list_heading">
				<td class="id_col">ID</td>
				<td>Tiêu Đề</td>
				<td>URL</td>
				<td>Thời Gian</td>
                <td>Trạng thái</td>
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
                <td>
                    {!! $app["status"] !!}
                    @if($app["status"] == "decide")
                        <a href="">Xin duyệt lại</a>
                    @endif
                </td>
                <td class="list_td aligncenter">
                    <a href="{{ url('devsites/app/edit') }}/{{ $app["id"] }}"    ><img src="{!! asset('public/mh94_admin/templates/images/edit.png')!!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href="" onclick="return xacnhanxoa('Bạn có chắc muốn xóa App này không',{{ $app["id"] }},'{{ url('devsites/app/delete') }}' );" ><img src="{!! asset('public/mh94_admin/templates/images/delete.png')!!}" /></a>
                </td>
            </tr>
            @endforeach



		</table>
        Trang 

            @for ($i = 1; $i < $numPages; $i++)
                @if ($i == $page)
                    {{ $i }}
                @else
                    <a href="/devsites/app/list/{{ $method }}/{{ $i }}" > {{ $i }} </a>
                @endif
            
            @endfor

            <script>
                $(document).ready(function() {
                    $("#method").val("{{ $method }}");
                    $("#method").change(function(){
                        //alert($("#method").val());
                         url= "{!! url('devsites/app/list/')!!}" + "/"+$("#method").val();
                        //alert(url);
                        window.location.replace(url);
                    });
                });
            </script>
@endsection