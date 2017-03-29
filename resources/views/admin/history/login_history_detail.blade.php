@extends('admin.master')
@section('title','Lịch sử hoạt động')
@section('content')
UID: {{ $data['id'] }}<br>
Tên: {{ $data['name'] }}<br>
Email: {{ $data['email'] }} <br>
<hr>
{!! $data['history']  !!}
@endsection