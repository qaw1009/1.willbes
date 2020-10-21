@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        지역별 공고문
    </div>

    <div class="w-Guide-Ssam mt20">
        <div class="NG ssamInfoMenu">
            <ul class="tabinfo">
                <li><a href="guide_3134_01">임용<br>시험제도</a><li>
                <li><a href="guide_3134_02">최근<br>10년동향</a><li>
                <li><a href="guide_3134_03" class="on">지역별<br>공고문</a><li>
                <li class="one"><a href="guide_3134_04">자료실</a><li>                
            </ul>
        </div>
        @include('html.m.guide_3134_03_inc')
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->
@stop