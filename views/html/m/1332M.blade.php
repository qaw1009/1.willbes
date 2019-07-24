@extends('html.m.layouts.master')

@section('content')
<link href="/public/css/willbes/promotion/2002_1332M.css" rel="stylesheet">

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="predictWrap">
        <div class="willbes-Tit"> 
            합격예측 풀서비스 <span class="NGEB">사전예약</span>
        </div>
        {{--30일 시험일전까지 사전예약 이벤트 노출--}}
        <div class="predictMain">
            <div class="mainImg">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1332M_01.jpg" title="2019년 경찰 2차 합격예측 풀서비스 사전예약">
            </div>
            <div class="mainBtn">
                <a href="#none" class="btn2">
                    사전예약 이벤트 참여하기
                </a>
            </div>
            <div class="sort">
                <div><span>일반<br>공채</span></div>
                <div><span>101<br>경비단</span></div>
                <div><span>경행<br>경채</span></div>
            </div>
        </div>

        {{--31일 00:00시부터 채점입력 노출--}}
        <div class="predictMain">
            <div class="mainImg">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1332M_02.jpg" title="2019년 경찰 2차 합격예측 풀서비스 사전예약">
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