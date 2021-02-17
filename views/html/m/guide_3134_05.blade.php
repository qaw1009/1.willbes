@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        대학 특강문의
    </div>

    <div class="w-Guide-Ssam pd-zero">
        <div class="request_con bg02 NSK">
            <p class="txt03">윌비스 임용고시 학원은 </p>
            <p class="txt02 NSK-Black">전국 대학교와 파트너십을 구축</p>
            <p class="txt03">하고 있으니 우수한 서비스와 콘텐츠를<br> 받아보시기 바랍니다.</p>
            <img src="https://static.willbes.net/public/images/promotion/m/2017/professor_img.png" alt="">
            <p class="txt04">제휴를 원하시는 대학은<br>아래 연락처로 연락 주시면 감사하겠습니다.</p>
            <div class="request_txtWrap">
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