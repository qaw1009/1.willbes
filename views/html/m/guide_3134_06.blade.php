@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        임용 교수채용
    </div>

    <div class="w-Guide-Ssam">
        <div class="request_con NSK">
            <p class="txt01">RECRUITMENT</p>
            <p class="txt03">교육에 대한 열정을 가지고 계신 교수님을</p>
            <p class="txt02 NSK-Black">윌비스 임용고시 학원에서 모시고자 합니다<i>!</i></p>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/professor_img00.png" alt="">
            <p class="txt04">교원임용시험은 교사에 대한 처우개선 및 직업의 <br>안정성으로 인하여 가장 선호되고 있는 시험 중 하나이며,<br>
            임용고시는 순위고사라는 우선 임용제 방식에서 <br>91년도부터 공개경쟁채용시험으로 변경되어 선발하고 있습니다.</p>
            <div class="request_txtWrap">
                <p class="txt01">“ 윌비스와 함께 큰 뜻을 이뤄나갈 준비가 되셨다면,<br>아래 연락처로 연락 주시면 감사하겠습니다.”</p>
                <p class="txt02"><span>과목 :</span> 임용시험 전과목</p>
                <p class="txt02"><span>담당자 :</span> 교원임용 본부장 최창식 ( 010-7167-2329 / genie001@willbes.com )</p>
                <p class="txt02"><span>학원문의 :</span> 1544-3169</p>
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