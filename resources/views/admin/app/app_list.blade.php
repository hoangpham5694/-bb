@extends('admin.master')
@section('title','Quản lý app')
@section('content')
<select id="method" name="chon">
  <option value="all">Tất cả</option>
  <option value="waiting">App đang chờ</option>
  <option value="accept">App đã duyệt</option>
  <option value="decide">App không duyệt</option>

</select>
		<table class="list_table">
			<tr class="list_heading">
				<td class="id_col">ID</td>
				<td>Tiêu Đề</td>
                <td>Người tạo</td>
				<td>Lượt xem</td>
				<td>Thời Gian</td>
                <td>Trạng thái</td>
				<td class="action_col">Quản lý?</td>
			</tr>

            @foreach($dataApp as $app)
                <tr class="list_data">
                <td class="aligncenter">{{ $app["id"] }}</td>
                <td class="list_td aligncenter">
                      <a href="{{ url('devsites/app/testappid') }}/{{ $app['id'] }}" target="_blank"> {!! $app["title"] !!}</td></a>
                </td>
                <td class="list_td aligncenter">{!! $app["username"] !!}</td>
                <td class="list_td aligncenter">{!! $app["view"] !!}</td>
                <td class="list_td aligncenter">
                    <?php \Carbon\Carbon::setLocale('vi');?>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($app["created_at"]))->diffForHumans() !!}

                </td>
                <td>{!! $app["status"] !!}
                    @if($app["status"] == "waiting")
                    <div style="float:right">
                        <a href="" onclick="return xacnhanxoa('Chuyển app này thành accept?',{{ $app['id'] }},'{{ url('adminsites/app/set/accept/') }}' );"><span class="glyphicon glyphicon-ok"></span></a> | <a href="" onclick="return xacnhanxoa('Chuyển app này thành decide?',{{ $app['id'] }},'{{ url('adminsites/app/set/decide/') }}' );"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                        
                    @endif
                     @if($app["status"] == "accept")
                      <div style="float:right">
                          <a href="" onclick="return xacnhanxoa('Chuyển app này thành decide?',{{ $app['id'] }},'{{ url('adminsites/app/set/decide/') }}' );"><span class="glyphicon glyphicon-remove"></span></a>
                      </div>

                     @endif
                     @if($app["status"] == "decide")
                      <div style="float:right">
                          <a href="" onclick="return xacnhanxoa('Chuyển app này thành waiting?',{{ $app['id'] }},'{{ url('adminsites/app/set/waiting/') }}' );" ><span class="glyphicon glyphicon-refresh"></span></a>
                      </div>

                     @endif
                </td>
                <td class="list_td aligncenter">
                    <a href="{{ url('adminsites/app') }}/edit/{{ $app["id"] }}"    ><img src="{!! asset('public/mh94_admin/templates/images/edit.png')!!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url('adminsites/app') }}/delete/{{ $app['id'] }}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa App này không');" ><img src="{!! asset('public/mh94_admin/templates/images/delete.png')!!}" /></a>
                </td>
            </tr>
            @endforeach



		</table>
        Trang 

            @for ($i = 1; $i < $numPages; $i++)
                @if ($i == $page)
                    {{ $i }}
                @else
                    <a href="/adminsites/app/list/{{ $method }}/{{ $i }}" > {{ $i }} </a>
                @endif
            
            @endfor

                        <script>
                $(document).ready(function() {
                    $("#method").val("{{ $method }}");
                    $("#method").change(function(){
                        //alert($("#method").val());
                         url= "{!! url('adminsites/app/list/')!!}" + "/"+$("#method").val();
                        //alert(url);
                        window.location.replace(url);
                    });
                });
            </script>
@endsection