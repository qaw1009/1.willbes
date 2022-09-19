@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>   
                종합반 모바일 수강증
            </div>
        </div>
    </div> 

    <div class="cardWrap">
        <ul class="cardBox">
            <li><span>경찰이 된다! 윌비스 경찰</span></li>
            <li>
                <div>[문/김]6개월 PASS</div>
                <div>04/04 ~ 08/20</div>
                <div>한주연 <span>(lilstar)</span></div>
            </li>
            <li class="tx-right">
                1,249,500원 (카드)<br>
                20220331121524137442<br>
                2022-03-31 12:18<br>
            </li>
            <li><img src="https://static.willbes.net/public/images/promotion/m/ssam_card_logo.jpg"></li>
        </ul>
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