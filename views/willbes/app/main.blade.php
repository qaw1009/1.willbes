@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        윌비스 하이브리드앱 메인페이지입니다.
        <br>
        {{$_SERVER['HTTP_USER_AGENT']}}
    </div>
    <!-- End Container -->
@stop