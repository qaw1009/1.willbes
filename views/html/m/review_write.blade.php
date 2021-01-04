@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>    
                수강후기
            </div>
        </div>
    </div>


    <div class="willbes-Txt NGR c_both mt20">
        · 수강 종료 강좌는 수강이 종료된 날로부터 30일 이내에만 후기 등록이 가능합니다.<br/>
        · 강좌와 무관한 내용, 의미없는 문자 나열, 비방이나 욕설이 있을 시 삭제될 수 있습니다<br/>
    </div>

    <div class="willbes-WriteBox NG tx-gray pb20">
        <div class="lecTitle">2020 [9/7급] 한덕현 영어 새벽 실전모의고사 문제해석, 풀이 (11월)</div>
        <div class="rating-stars text-center">
            <span>수강만족도</span>
            <ul id="stars">
                <li class="star" title="" data-value='1'>
                    <i class="fa fa-star fa-fw"></i>
                </li>
                <li class="star" title="" data-value='2'>
                    <i class="fa fa-star fa-fw"></i>
                </li>
                <li class="star" title="" data-value='3'>
                    <i class="fa fa-star fa-fw"></i>
                </li>
                <li class="star" title="" data-value='4'>
                    <i class="fa fa-star fa-fw"></i>
                </li>
                <li class="star" title="" data-value='5'>
                    <i class="fa fa-star fa-fw"></i>
                </li>
            </ul>                
            <div class="success-box">
                <div class="text-message">0</div>/ 5
            </div>
        </div>

        <div class="willbes-Lec-Search NG width100p mt10 mb10">
            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목" maxlength="30">
        </div>

        <textarea></textarea>
    </div>  

    <div id="Fixbtn" class="Fixbtn two">
        <ul>
            <li class="btn-purple"><a href="#none">등록</a></li>
            <li class="btn_gray"><a href="#none">취소</a></li>
        </ul>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    <div id="LecBuyMessagePop" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                해당 상품이 장바구니에 담겼습니다.<br>
                장바구니로 이동하시겠습니까?
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray">예</a>
                <a href="#none" class="btn_white">계속구매</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
    </div>
    <!-- willbes-Layer-PassBox : 쪽지 -->

</div>
<!-- End Container -->
@stop