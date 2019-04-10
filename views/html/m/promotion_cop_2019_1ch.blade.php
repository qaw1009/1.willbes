@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="predictWrap">
        <div class="willbes-Tit"> 
            합격예측 풀서비스 <span class="NGEB">사전예약</span>
        </div>

        <div class="predictMain">
            <div class="mainImg">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1187M_01.jpg" title="2019년 경찰 1차 합격예측 풀서비스 사전예약">
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