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
<br/><br/><br/><br/>
<ul>
    <li><img style="width: 100%" src="{{ img_url('gosi/guide/icon_myacad_gif.gif') }}"><div>gif</div></li>
    <li><img style="width: 100%" src="{{ img_url('gosi/guide/icon_myacad_png.png') }}"><div>png</div></li>
    <li><img style="width: 100%" src="{{ img_url('gosi/guide/icon_myacad_100.jpg') }}"><div>100</div></li>
    <li><img style="width: 100%" src="{{ img_url('gosi/guide/icon_myacad_80.jpg') }}"><div>80</div></li>
    <li><img style="width: 100%" src="{{ img_url('gosi/guide/icon_myacad_70.jpg') }}"><div>70</div></li>
    <li><img style="width: 100%" src="{{ img_url('gosi/guide/icon_myacad_png_big.png') }}"><div>png_big</div></li>
</ul>

    <img style="width: 100%" src="{{ img_url('gosi/guide/guide_public_c3.jpg') }}"><br/><br/>

    <img style="width: 100%" src="{{ img_url('gosi/guide/guide_public_c3_100.jpg') }}"><br/><br/>

    <img style="width: 100%" src="{{ img_url('gosi/guide/guide_public_c3_gif.gif') }}"><br/><br/>

    <img style="width: 100%" src="{{ img_url('gosi/guide/guide_public_c3_png.png') }}">
</div>
<!-- End Container -->
@stop