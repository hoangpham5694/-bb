<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="{!! asset('public/mh94_admin/templates/css/style.css')!!}" />


<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script ype="text/javascript" src="{!! asset('public/elfinder/js/elfinder.full.js')!!}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('public/elfinder/css/theme.css')!!}">
	<title>Admin Area :: @yield('title')</title>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area :: @yield('title')
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="{!! url('adminsites')!!}">Trang chính</a> | <a href="{!! url('adminsites/user')!!}">Quản lý user</a> | <a href="">Quản lý danh mục</a> | <a href="{!! url('adminsites/app/list')!!}">Quản lý app</a>
				</td>
				<td align="right">
					Xin chào {!! Auth::user()->name!!} | <a href="{!! url('adminsites/user/changepass') !!}">Đổi mật khẩu</a> | <a href="{!! url('logout') !!}">Logout</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">
    	@include('admin.blocks.error')  
    	@include('admin.blocks.flash')
		@yield('content')
	</div>
    <div id="bottom">
        Copyright © 2016
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{!! asset('public/mh94_admin/templates/js/myscript.js')!!}"></script>
</body>
</html>