@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container c_both mb20">
        <div class="introBox">
            <a href="#none">
                <a href="{{ front_app_url('/home/index', 'cop') }}"><img src="{{ img_url('m/intro/intro1.jpg') }}"></a>
            </a>
        </div>
        <div class="introBox">
            <a href="{{ front_app_url('/home/index', 'gosi') }}">
                <div class="subTit NSK-Thin">9급 / 7급 / 법원 / 소방 / 기술 / 군무원</div>
                <div class="Tit NSK-Black"><span class="gosi-color">공무원</span> 온라인</div>
                <div class="btnGo NSK"><span>바로가기 ></span></div>
        </div>
    </div>
    </div>
    <!-- End Container -->
@stop