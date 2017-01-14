@extends('admin.master')
@section('title','Danh mục')
@section('content')
<table class="list_table">
            <tr class="list_heading">
                <td class="id_col">STT</td>
                <td>Danh Mục</td>
                <td class="action_col">Quản lý?</td>
            </tr>
            <tr class="list_data">
                <td class="aligncenter">1</td>
                <td class="list_td alignleft">Vũ Quốc Tuấn</td>
                <td class="list_td aligncenter">
                    <a href=""><img src="{!! asset('public/mhp94_admin/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><img src="{!! asset('public/mhp94_admin/templates/images/delete.png') !!}" /></a>
                </td>
            </tr>
            <tr class="list_data">
                <td class="aligncenter">2</td>
                <td class="list_td alignleft">--| Vũ Quốc Tuấn</td>
                <td class="list_td aligncenter">
                    <a href=""><img src="{!! asset('images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><img src="{!! asset('images/delete.png') !!}" /></a>
                </td>
            </tr>
            <tr class="list_data">
                <td class="aligncenter">3</td>
                <td class="list_td alignleft">--| --| Vũ Quốc Tuấn</td>
                <td class="list_td aligncenter">
                    <a href=""><img src="{!! asset('images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><img src="{!! asset('images/delete.png') !!}" /></a>
                </td>
            </tr>
        </table>
        @endsection