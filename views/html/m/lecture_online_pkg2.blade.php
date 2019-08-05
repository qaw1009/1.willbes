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
                수강신청 > 추천패키지
            </div>
        </div>
    </div>

    <div>
        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td>
                            <div class="w-data tx-left widthAutoFull">
                                <dl class="w-info pt-zero">
                                    <dt>기본이론</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)
                                </div>
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt class="h27"><strong>개강일</strong>2019년 6월</dt><br/>
                                        <dt class="h27"><strong>수강기간</strong><span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span> </dt>
                                    </dl>
                                </div>
                            </div>                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="priceBox">
            <ul>
                <li><strong>패키지</strong> 270,000원<span class="tx-red">(↓40%)</span> ▶ <span class="tx-blue">162,000원</span></li>
                <li><strong>교재</strong> 0원</li>
                <li class="NGEB"><strong>총 주문금액</strong> <span class="tx-blue">150,000원</span></li>
            </ul>
            <p class="tx-red mt10 NGR">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</p>
        </div>

        <div class="lec-info">
            <h4 class="NGEB">강좌신청 및 교재선택 <a href="#none" class="NGR">교재정보 전체보기</a></h4>
            <div class="w-data tx-left">
                <dl class="w-info pt-zero">
                    <dt>영어<span class="row-line">|</span>한덕현</dt>
                </dl>
                <div class="w-tit mt10">
                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)</a>
                </div>
                <div class="w-info tx-gray">
                    <dl>
                        <dt class="h27"><strong>강의수</strong><span class="tx-blue">8강</span> <strong class="ml20">정상가</strong><span class="tx-blue">90,000원</span> <span class="NSK ml20 nBox n1">1.5배수</span> <span class="NSK nBox n2">진행중</span></dt>
                        <dt class="h27">
                            <strong>맛보기</strong><a href="#none" class="tBox black NSK">HIGH</a> <a href="#none" class="tBox gray NSK">LOW</a>
                        </dt>
                    </dl>
                </div>
                <div class="w-book">
                    ※ 별도 구매 가능한 교재가 없습니다.
                </div>
            </div>
            <div class="w-data tx-left">
                <dl class="w-info pt-zero">
                    <dt>영어<span class="row-line">|</span>한덕현</dt>
                </dl>
                <div class="w-tit mt10">
                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)</a>
                </div>
                <div class="w-info tx-gray">
                    <dl>
                        <dt class="h27"><strong>강의수</strong><span class="tx-blue">8강</span> <strong class="ml20">정상가</strong><span class="tx-blue">90,000원</span> <span class="NSK ml20 nBox n1">1.5배수</span> <span class="NSK nBox n2">진행중</span></dt>
                        <dt class="h27">
                            <strong>맛보기</strong><a href="#none" class="tBox black NSK">HIGH</a> <a href="#none" class="tBox gray NSK">LOW</a>
                        </dt>
                    </dl>
                </div>
                <div class="w-book mb-zero">
                    <ul>
                        <li>
                            <span class="chk">
                                <label>[판매]</label>
                                <input type="checkbox" id="" name="">
                            </span>
                            <div class="priceWrap NG">
                                주교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                                <p class="NGR">[판매] <span class="tx-blue">42,000원</span>(↓10%)</p>
                            </div>
                        </li>
                        <li>
                            <span class="chk">
                                <label>[품절]</label>
                                <input type="checkbox" id="" name="" disabled>
                            </span>
                            <div class="priceWrap NG">
                                부교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                                <p class="NGR">[품절] <span class="tx-blue">42,000원</span>(↓10%)</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>        

        <div class="lec-info NGR">
            <h4 class="NGEB">패키지정보</h4>
            <div class="lec-info-pkg">                    
                <strong>패키지유의사항 (필독)</strong><br>
                *** 동영상 배수 제한 시범운영 콘텐츠입니다. ***
                최근 교육콘텐츠(동영상강의, 교재, 학습자료 등)에 대한 공유, 복제, 배포, 판매 등 
                부정사용으로 인한 피해사례 및 피해신고가 접수되고 있습니다.
                <br><br>
                위와 같은 피해를 예방하기 위하여 일부 동영상 강좌에 한하여 ‘진도율 배수 제한’ 시범 적용할 예정입니다.
                배수 제한은 수험생들의 수강 이력 데이터 통계를 기반으로 하여 수강에 불편이 없는 최소한의 제한을 두게 되었습니다. 
                이점 많은 양해바랍니다.
                <br>  <br>  
                [배수란~]<br>
                # 배수 제한은 각 강의마다 실제 강의 시간에 해당강좌에 별도 설정된 강의배수 만큼 수강이 가능합니다.<br>
                # 빠른 배속으로 수강하더라도 실제 강의 시간이 적용됩니다.
                <br><br>
                <strong>패키지소개</strong><br>
                19년 1차 최종합격을 위한 황세웅 교수님의 비법 강의!<br>
                <br>
                [구성강좌]<br>
                2019년 경찰 1차시험 황세웅 면접이론 총론 특강<br>
                2019년 경찰 1차시험 황세웅 면접이론 각론 특강<br>
                2019년 경찰 1차시험 황세웅 면접 시사특강
            </div>
        </div>
        
        <div class="lec-btns">
            <ul>
                <li><a href="#none" onClick='alert("강좌 또는 교재를 선택하세요.")' class="btn_black_line">강좌목록</a></li>
                <li><a href="#none" onclick="openWin('LecBuyMessagePop')" class="btn-purple">장바구니</a></li>
                <li><a href="#none" onClick='alert("도서구입비 소득공제 ...")' class="btn-purple-line">바로결제</a></li>
            </ul>
        </div>
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