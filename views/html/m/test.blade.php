@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both mb20">
    <style>
        ul li {float:left;}
    </style>
    <ul>
        <li><img style="width: 100%" src="{{ img_url('gosi/guide/logo_gif.gif') }}"><div>gif</div></li>
        <li><img style="width: 100%" src="{{ img_url('gosi/guide/logo_png.png') }}"><div>png</div></li>
        <li><img style="width: 100%" src="{{ img_url('gosi/guide/logo_100.jpg') }}"><div>100</div></li>
        <li><img style="width: 100%" src="{{ img_url('gosi/guide/logo_80.jpg') }}"><div>80</div></li>
        <li><img style="width: 100%" src="{{ img_url('gosi/guide/logo_70.jpg') }}"><div>70</div></li>
    </ul>

    <br/><br/><div style="clear:both"></div><br/><br/>

    <ul>
        <li style="width: 230px"><img style="width: 100%" src="{{ img_url('gosi/guide/icon_menu.png') }}"><div>png230</div></li>
        <li style="width: 150px"><img style="width: 100%" src="{{ img_url('gosi/guide/icon_menu.png') }}"><div>png150</div></li>
        <li style="width: 100px"><img style="width: 100%" src="{{ img_url('gosi/guide/icon_menu.png') }}"><div>png100</div></li>
        <li style="width: 50px"><img style="width: 100%" src="{{ img_url('gosi/guide/icon_menu.png') }}"><div>png50</div></li>
        <li style="width: 25px"><img style="width: 100%" src="{{ img_url('gosi/guide/icon_menu.png') }}"><div>png25</div></li>
    </ul>
</div>
<!-- End Container -->
@stop