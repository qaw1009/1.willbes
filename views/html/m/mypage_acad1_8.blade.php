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
                단과반 모바일 수강증
            </div>
        </div>
    </div> 

    <div class="cardWrap">
        <ul>
            <li>한주연(463463)</li>
            <li>상품명이 출력됩니다. 상품명이출력됩니다. 상품명이 출력됩니다. 상품명이출력됩니다. </li>
            <li>2022-06-28
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/m/card_logo.png" alt="">
                    <span>임용</span>
                    <img src="/public/img/willbes/stamp/stamp.png">
                </div>
            </li>
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