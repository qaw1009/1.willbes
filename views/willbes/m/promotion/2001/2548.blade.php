@extends('willbes.m.layouts.master')

@section('content')

<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }

</style>

<link href="/public/css/willbes/promotion/2001_m2548.css" rel="stylesheet">

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="predictWrap">
        <div class="willbes-Tit"> 
            합격예측 풀서비스 <span class="NGEB">사전예약</span>
        </div>
        {{--30일 시험일전까지 사전예약 이벤트 노출--}}
        <div class="predictMain">
            <div class="mainImg">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2548_m_before.jpg" title="2022년 경찰 1차 합격예측 풀서비스 사전예약">
            </div>
            <div class="mainBtn">
                <a href="#none" class="btn2">
                    사전예약 이벤트 참여하기
                </a>
            </div>
            <div class="sort">
                <div><span>일반<br>공채</span></div>
                <div><span>101<br>경비단</span></div>
                <div><span>전의경<br>경채</span></div>
            </div>
        </div>

        {{--31일 00:00시부터 채점입력 노출--}}
        <div class="predictMain">
            <div class="mainImg">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2548_m_after.jpg" title="2022년 경찰 1차 합격예측 풀서비스 사전예약">
            </div>
            <div class="mainBtn">
                {{--로그인 전--}}
                <a href="#none">                    
                    로그인 후 서비스 이용이 가능합니다.
                </a>
                {{--로그인 후--}}
                <a href="#none" class="btn2">                    
                   채점 서비스 시작하기
                </a>
            </div>
            <div class="marktxt1">
                OMR 정답지에 답을 체크 하는 [일반채점] 서비스 및 합격예측 분석 데이터는 PC버전을 이용해 주세요
            </div>
        </div>
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