@extends('admin.master')
@section('title','Quản lý lịch sử người dùng')
@section('content')
<input type="text" id="txt-search"> <button id="btn-search">Search</button>
		<table class="list_table">
			<tr class="list_heading">
         <td>Hình</td>
				<td class="id_col">ID</td>
				<td>Tên</td>
               
				<td>Email</td>
				<td>Ngày tạo</td>
        <td>Hoạt động lần cuối</td>
				<td class="action_col">Quản lý?</td>
			</tr>

            @foreach($data as $history)
                <tr class="list_data">
                  <td class="aligncenter">
                    <img src="{!! $history["image_url"] !!}" width="50px" height="50px" alt="">
                  </td>
                <td class="aligncenter">{{ $history["id"] }}</td>
                <td class="list_td aligncenter">
                      {!! $history["name"] !!}
                </td>
                <td class="list_td aligncenter">{!! $history["email"] !!}</td>
                <td class="list_td aligncenter">{!! $history["created_at"] !!}</td>
                <td class="list_td aligncenter">{!! $history["updated_at"] !!}</td>
                <td>
                   <a href="{{ url('adminsites/history/') }}/detail/{{ $history["id"] }}"    ><span class="glyphicon glyphicon-search"></span></a>
                </td>

            </tr>
            @endforeach



		</table>
        Trang 

            @for ($i = 1; $i < $numPages; $i++)
                @if ($i == $page)
                    {{ $i }}
                @else
                    <a href="/adminsites/history/list/{{ $key }}/{{ $i }}" > {{ $i }} </a>
                @endif
            
            @endfor

                        <script>
                $(document).ready(function() {
                    $("#txt-search").val("{{ $key }}");
                    $("#txt-search").change(function(){
                        //alert($("#method").val());
                         url= "{!! url('adminsites/history/list/')!!}" + "/"+$("#txt-search").val();
                        //alert(url);
                        window.location.replace(url);
                    });
                });
            </script>
@endsection