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
                수강신청 > 기간제 패키지
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
                                <div class="w-tit tx-blue">
                                    2020 [합격을 깨우는 0교시] 기미진 기특한 국어 새벽실전모의고사 PASS
                                </div>
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt class="h27"><strong>개강일</strong>2020년 3월</dt><br/>
                                        <dt class="h27"><strong>수강기간</strong><span class="tx-blue">120일</span> <span class="NSK ml10 nBox n1">무제한</span> </dt>
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
            <h4 class="NGEB">강좌구성</h4>
            <div class="lec-choice-pkg">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span>국어 기미진</span>
                                    </div>
                                    <div class="w-tit mb0">
                                        2020 기미진 기특한 국어 새벽실전모의고사 - 합격을 깨우는 0교시(3월)
                                    </div>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span>국어 기미진</span>
                                    </div>
                                    <div class="w-tit mb0">
                                        2020 기미진 기특한 국어 새벽실전모의고사 - 합격을 깨우는 0교시(3월)
                                    </div>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span>국어 기미진</span>
                                    </div>
                                    <div class="w-tit mb0">
                                        2020 기미진 기특한 국어 새벽실전모의고사 - 합격을 깨우는 0교시(3월)
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>        

        <div class="lec-info NGR">
            <h4 class="NGEB">패키지정보</h4>
            <div class="lec-info-pkg">                    
                <strong>패키지유의사항 (필독)</strong><br>
                - 수강방법 : 강의수강신청 > 내강의실 > 프리Pass 존 > 수강중인강의 > 선택강의 담기 > 수강
                <br><br>
                <strong>패키지소개</strong><br>
                - 2020 [합격을 깨우는 0교시] 기미진 기특한 국어 새벽실전모의고사 PASS<br>
                - 실전과 비슷한 유형의 난이도로 문제풀이하는 과정<br>
                - 실전감각을 기르고 시험에 대비하는 과정
                <br><br>
                <strong>패키지특징</strong><br>
                - 2020 [합격을 깨우는 0교시] 기미진 기특한 국어 새벽실전모의고사 PASS<br>
                - 강의일정 : 2019.11월~2020.5월 진행 과정 제공, 70회 과정<br>
                - 강의교재 : 기특한 국어 아침하프모의고사(프린트)<br>
                - 수강대상 : 시험 전 실전 대비 문제풀이가 필요한 수험생<br>
            </div>
        </div>
        
        <div class="lec-btns w100p">
            <ul>
                <li><a href="#none"  class="btn-purple-line">바로결제</a></li>
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

    <div id="InfoForm" class="willbes-Layer-Black NG">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>
                2020 기미진 기특한 국어 기본/심화이론(7-8월)
            </h4>
            <div class="LecDetailBox">
                <h5>강좌상세정보</h5>
                <dl class="w-info tx-gray">
                    <dt>학원실강의 <span class="ml10">2020년 1월</span></dt>
                    <dt>
                        강의수 <span class="tx-blue">12강/56강</span><span class="row-line ml10">|</span> 
                        수강기간 <span class="tx-blue">50일</span> 
                        <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span>
                    </dt>
                </dl>
                <h5>강좌소개</h5>
                <div class="tx-dark-gray">
                    - 2020 기미진 기특한 국어 기본/심화이론(7-8월)<br>
                    - 강의일정 : 7/8 ~ 8/28 월, 수 09:00~13:00 [16회 완성]<br>
                    - 강의교재 : 2020 기특한 국어 기본서(배움 출간예정)<br>
                    - 2020 기미진 기특한 국어 기본/심화이론(7-8월)<br>
                    - 강의일정 : 7/8 ~ 8/28 월, 수 09:00~13:00 [16회 완성]<br>
                    - 강의교재 : 2020 기특한 국어 기본서(배움 출간예정)<br>
                </div>
                <h5>강좌특징</h5>
                <div class="tx-dark-gray">
                    - 2020 기미진 기특한 국어 기본/심화이론(7-8월)<br>
                    [수강대상]<br>
                    - 공무원 국어를 처음 공부하시는 분과 이론을 재 복습하시는 분 모두 가능한 최적의 강좌!<br>
                    - 7/9 급, 법원직, 각종 공무원 시험 대비로 초학자들도 충분히 수강할 수 있는 강좌!<br>
                    - 공무원 국어를 처음 공부하시는 분과 이론을 재 복습하시는 분 모두 가능한 최적의 강좌!<br>
                    - 7/9 급, 법원직, 각종 공무원 시험 대비로 초학자들도 충분히 수강할 수 있는 강좌!<br>
                    - 공무원 국어를 처음 공부하시는 분과 이론을 재 복습하시는 분 모두 가능한 최적의 강좌!<br>
                    - 7/9 급, 법원직, 각종 공무원 시험 대비로 초학자들도 충분히 수강할 수 있는 강좌!<br>
                    - 공무원 국어를 처음 공부하시는 분과 이론을 재 복습하시는 분 모두 가능한 최적의 강좌!<br>
                    - 7/9 급, 법원직, 각종 공무원 시험 대비로 초학자들도 충분히 수강할 수 있는 강좌!<br>
                </div>
            </div>
        </div>
        <div class="dim" onclick="closeWin('InfoForm')"></div>
    </div>


</div>
<!-- End Container -->
@stop